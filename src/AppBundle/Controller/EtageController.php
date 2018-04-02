<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Etage controller.
 *
 * @Route("etage")
 */
class EtageController extends Controller
{
    /**
     * Lists all etage entities.
     *
     * @Route("/", name="etage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etages = $em->getRepository('AppBundle:Etage')->findAll();

        return $this->render('etage/index.html.twig', array(
            'etages' => $etages,
        ));
    }

    /**
     * Creates a new etage entity.
     *
     * @Route("/new", name="etage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etage = new Etage();
        $form = $this->createForm('AppBundle\Form\EtageType', $etage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etage);
            $em->flush();

            return $this->redirectToRoute('etage_show', array('id' => $etage->getId()));
        }

        return $this->render('etage/new.html.twig', array(
            'etage' => $etage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etage entity.
     *
     * @Route("/{id}", name="etage_show")
     * @Method("GET")
     */
    public function showAction(Etage $etage)
    {
        $deleteForm = $this->createDeleteForm($etage);

        return $this->render('etage/show.html.twig', array(
            'etage' => $etage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etage entity.
     *
     * @Route("/{id}/edit", name="etage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etage $etage)
    {
        $deleteForm = $this->createDeleteForm($etage);
        $editForm = $this->createForm('AppBundle\Form\EtageType', $etage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etage_edit', array('id' => $etage->getId()));
        }

        return $this->render('etage/edit.html.twig', array(
            'etage' => $etage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etage entity.
     *
     * @Route("/{id}", name="etage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etage $etage)
    {
        $form = $this->createDeleteForm($etage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etage);
            $em->flush();
        }

        return $this->redirectToRoute('etage_index');
    }

    /**
     * Creates a form to delete a etage entity.
     *
     * @param Etage $etage The etage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etage $etage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etage_delete', array('id' => $etage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
