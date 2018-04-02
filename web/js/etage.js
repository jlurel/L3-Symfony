var $site = $('#appbundle_etage_site');
// When sport gets selected ...
$site.change(function() {
    // ... retrieve the corresponding form.
    var $form = $(this).closest('form');
    // Simulate form data, but only include the selected sport value.
    var data = {};
    data[$site.attr('name')] = $site.val();
    // Submit data via AJAX to the form's action path.
    $.ajax({
        url : $form.attr('action'),
        type: $form.attr('method'),
        data : data,
        success: function(html) {
            // Replace current position field ...
            $('#appbundle_etage_batiment').replaceWith(
                // ... with the returned one from the AJAX response.
                $(html).find('#appbundle_etage_batiment')
            );
            // Position field now displays the appropriate positions.
        }
    });
});