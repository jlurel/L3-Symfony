<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 11/03/2018
 * Time: 20:49
 */

namespace AppBundle\Controller;


use AppBundle\Form\EtageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtageController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(EtageFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etage = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($etage);
            $em->flush();

            $this->addFlash('success', 'Etage bien enregistré');
            return $this->redirect('etage_view', array('id' => $etage->getNumEtage()));
        }

        return $this->render('Etage/add.form.html.twig', array(
            'etage_form' => $form->createView(),
        ));

    }
}