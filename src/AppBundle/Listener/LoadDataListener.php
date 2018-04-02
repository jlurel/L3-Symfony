<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 22/03/2018
 * Time: 11:44
 */

namespace AppBundle\Listener;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AppBundle\Entity\Reservation as CalendarEvent;
use AppBundle\Entity\Reservation;

class LoadDataListener
{
    /**
     * @param Reservation $calendarEvent
     *
     * @return FullCalendarEvent[]
     */
    public function loadData(Reservation $calendarEvent)
    {
        /*
        $startDate = $calendarEvent->getStartDate();
        $endDate = $calendarEvent->getEndDate();
        $filters = $calendarEvent->getFilters();

        //You may want do a custom query to populate the events

        $calendarEvent->addEvent(new Reservation('Event Title 1', new \DateTime()));
        $calendarEvent->addEvent(new Reservation('Event Title 2', new \DateTime()));
        */
        return $calendarEvent->toArray();
    }
}