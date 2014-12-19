<?php

namespace Estei\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\AppBundle\Entity\LevelsScale;
use Estei\AppBundle\Form\LevelsScaleType;

/**
 * LevelsScale controller.
 *
 */
class LevelsScaleController extends Controller
{

    /**
     * Lists all LevelsScale entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiAppBundle:LevelsScale')->findAll();

        return $this->render('EsteiAppBundle:LevelsScale:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new LevelsScale entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new LevelsScale();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('levels_scale_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiAppBundle:LevelsScale:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a LevelsScale entity.
     *
     * @param LevelsScale $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LevelsScale $entity)
    {
        $form = $this->createForm(new LevelsScaleType(), $entity, array(
            'action' => $this->generateUrl('levels_scale_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LevelsScale entity.
     *
     */
    public function newAction()
    {
        $entity = new LevelsScale();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiAppBundle:LevelsScale:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LevelsScale entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:LevelsScale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LevelsScale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:LevelsScale:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LevelsScale entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:LevelsScale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LevelsScale entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:LevelsScale:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a LevelsScale entity.
    *
    * @param LevelsScale $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LevelsScale $entity)
    {
        $form = $this->createForm(new LevelsScaleType(), $entity, array(
            'action' => $this->generateUrl('levels_scale_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LevelsScale entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:LevelsScale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LevelsScale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('levels_scale_edit', array('id' => $id)));
        }

        return $this->render('EsteiAppBundle:LevelsScale:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a LevelsScale entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiAppBundle:LevelsScale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LevelsScale entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('levels_scale'));
    }

    /**
     * Creates a form to delete a LevelsScale entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('levels_scale_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
