<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SalleController extends Controller
{
    public function addAction(Request $request)
    {
        $salle = new Salle();
        $form = $this->get('form.factory')->create(Salle::class, $salle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salle = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();

            $this->addFlash('success', 'Salle bien enregistrée');
            return $this->redirect('salle_view', array('id' => $salle->getId()));
        }

        return $this->render('Salle/add.form.html.twig', array(
            'salle_form' => $form->createView(),
        ));

    }
}
