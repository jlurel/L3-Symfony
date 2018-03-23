<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CalendarEvent;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarEventController extends Controller
{
    public function loadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('AppBundle:CalendarEvent')->findAll();

        $calendarService = $this->get('appbundle.service.listener');
        $events = array();

        foreach ($evenements as $key => $evenement) {
            $events[] = $calendarService->loadData($evenement);
        }

        return new JsonResponse($events);
    }

    /**
     * Edite un evenement par redimensionement
     * @param Request $request
     * @return Response
     */
    public function resizeEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');
            $startDate = $request->request->get('start');
            $endDate = $request->request->get('end');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->resizeEvent($idEvent,$startDate,$endDate);

        }

        return new Response("Erreur.");
    }

    /**
     * Edite un évenement par glissement
     * @param Request $request
     * @return Response
     */
    public function dropEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');
            $startDate = $request->request->get('start');
            $endDate = $request->request->get('end');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->dropEvent($idEvent,$startDate,$endDate);

        }

        return new Response("Erreur.");
    }

    /**
     * Suppression d'un évenement
     * @param Request $request
     * @return Response
     */
    public function deleteEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->deleteEvent($idEvent);

        }

        return new Response("Erreur.");
    }

    /**
     * Edite un évenement par son titre et commentaire
     * @param Request $request
     * @return Response
     */
    public function editEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');
            $newTitle = $request->request->get('new_title');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->editEvent($idEvent, $newTitle);

        }

        return new Response("Erreur.");
    }

    public function addEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $title = $request->request->get('title');
            $startDate = $request->request->get('start');
            $endDate = $request->request->get('end');

            $startDate = new DateTime($startDate);
            $endDate = new DateTime($endDate);

            $evenement = new CalendarEvent();

            $evenement->setTitle($title);
            $evenement->setStartDate($startDate);
            $evenement->setEndDate($endDate);

            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);

            $em->flush();
        }

        return new Response('Nouvel evenement enregistre ');
    }
}
