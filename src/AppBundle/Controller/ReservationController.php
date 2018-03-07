<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends Controller
{
    public function addAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->get('form.factory')->create(Reservation::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            $this->addFlash('success', 'Réservation bien enregistrée');
            return $this->redirect('reservation_view', array('id' => $reservation->getId()));
        }

        return $this->render('Reservation/add.form.html.twig', array(
            'reservation_form' => $form->createView(),
        ));

    }
}
