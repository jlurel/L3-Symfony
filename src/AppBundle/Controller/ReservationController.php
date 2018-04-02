<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reservation;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends Controller
{
    public function loadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('AppBundle:Reservation')->findAll();

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
            $rst = $em->getRepository('AppBundle:Reservation')->resizeEvent($idEvent,$startDate,$endDate);

        }

        return new Response("Resize done.");
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
            $rst = $em->getRepository('AppBundle:Reservation')->dropEvent($idEvent,$startDate,$endDate);

        }

        return new Response("Drop done.");
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
            $rst = $em->getRepository('AppBundle:Reservation')->deleteEvent($idEvent);

        }

        return new Response("Delete done.");
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
            $rst = $em->getRepository('AppBundle:Reservation')->editEvent($idEvent, $newTitle);

        }

        return new Response("Edit done.");
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

            $evenement = new Reservation();

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
