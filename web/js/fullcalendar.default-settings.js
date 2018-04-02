$(function () {
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
        timezone: ('Europe/London'),
        businessHours: {
            start: '08:00',
            end: '20:30',
            dow: [1, 2, 3, 4, 5]
        },
        selectConstraint: {
            start: '08:00',
            end: '20:30',
            dow: [1, 2, 3, 4, 5]
        },
        eventConstraint: {
            start: '08:00',
            end: '20:30',
            dow: [1, 2, 3, 4, 5]
        },
        allDaySlot: false,
        defaultView: 'agendaWeek',
        lazyFetching: true,
        firstDay: 1,
        selectable: true,
        editable: true,
        eventDurationEditable: true,
        navLinks: true,
        eventColor: 'light-blue',
        eventSources: [
            {
                url: '/calendrier',
                type: 'POST',
                data: {},
                error: function () {}
            }
        ],

        eventClick:  function(event, jsEvent, view) {
            endtime = $.fullCalendar.moment(event.end).format('H:mm');
            starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
            var mywhen = starttime + ' - ' + endtime;
            $('#modalTitle').html(event.title);
            $('#modalWhen').text(mywhen);
            $('#eventID').val(event.id);
            $('#calendarModal').modal();
        },

        //header and other values
        select: function(start, end, jsEvent) {
            endtime = $.fullCalendar.moment(end).format('H:mm');
            starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
            var mywhen = starttime + ' - ' + endtime;
            start = moment(start).format();
            end = moment(end).format();
            $('#createEventModal').find('#startTime').val(start);
            $('#createEventModal').find('#endTime').val(end);
            $('#createEventModal').find('#when').text(mywhen);
            $('#createEventModal').modal('toggle');
        },

        eventResize: function(event) {
            console.log("Entrée dans : eventResize");
            var start1 = event.start.format("YYYY-MM-DD HH:mm:ss");
            var end1 = event.end.format("YYYY-MM-DD HH:mm:ss");
            var xhr = $.ajax({
                type: "POST",
                url: '/calendrier/resize',
                data: 'title=' + event.title + '&start=' + start1 + '&end=' + end1 + '&id=' + event.id,
                success: function(data) {
                    console.log(data);
                    $("#calendar-holder").fullCalendar('rerenderEvents');
                },
                error: function() {
                    alert("erreur lors de l'appel de l'url dans POST event/resize : contactez l'administrateur du site");
                },
            });
        },

        eventDrop: function(event){
            console.log("Entrée dans : eventDrop");
            console.log(event);
            var start1 = event.start.format("YYYY-MM-DD HH:mm:ss");
            var end1 = event.end.format("YYYY-MM-DD HH:mm:ss");

            var xhr = $.ajax({

                url: '/calendrier/drop',
                data: 'title=' + event.title+'&start=' + start1 +'&end=' + end1 + '&id=' + event.id ,
                type: "POST",
                success: function(data) {
                    console.log(data);
                    $("#calendar-holder").fullCalendar('rerenderEvents');
                    //alert(json);
                },
                error: function() {
                    alert("erreur lors de l'appel de l'url dans POST event/drop : contactez l'administrateur du site");
                },
            });
        }
    });

    $('#submitButton').on('click', function(e){
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();
        doSubmit();
    });

    $('#deleteButton').on('click', function(e){
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();
        doDelete();
    });

    function doDelete(){
        $("#calendarModal").modal('hide');
        var eventID = $('#eventID').val();
        $.ajax({
            url: '/calendrier/delete',
            data: 'id='+eventID,
            type: "POST",
            success: function(json) {
                $("#calendar-holder").fullCalendar('removeEvents',eventID);
            }
        });
    }
    function doSubmit(){
        $("#createEventModal").modal('hide');
        var title = $('#title').val();
        var startTime = $('#startTime').val();
        var endTime = $('#endTime').val();

        $.ajax({
            url: '/calendrier/add',
            data: 'title='+title+'&start='+startTime+'&end='+endTime,
            type: "POST",
            success: function(json) {
                $("#calendar-holder").fullCalendar('refetchEvents');
            }
        });

    }
});

