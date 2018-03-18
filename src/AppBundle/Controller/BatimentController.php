<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 11/03/2018
 * Time: 20:56
 */

namespace AppBundle\Controller;


use AppBundle\Form\BatimentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BatimentController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(BatimentFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $batiment = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($batiment);
            $em->flush();

            $this->addFlash('success', 'Batiment bien enregistré');
            return $this->redirectToRoute('batiment_add');
        }

        return $this->render('Batiment/add.form.html.twig', array(
            'batiment_form' => $form->createView(),
        ));

    }
}