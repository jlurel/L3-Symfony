<?php

namespace AppBundle\Controller;

use AppBundle\Form\SalleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RechercherSalleController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(SalleFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salle = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();

            $this->addFlash('success', 'Salle bien enregistrée');
            return $this->redirect('salle_view', array('id' => $salle->getNumSalle()));
        }

        return $this->render('Salle/add.form.html.twig', array(
            'salle_form' => $form->createView(),
        ));

    }
}