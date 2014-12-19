<?php

namespace Estei\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\AppBundle\Entity\GradingDetail;
use Estei\AppBundle\Form\GradingDetailType;

/**
 * GradingDetail controller.
 *
 */
class GradingDetailController extends Controller
{

    /**
     * Lists all GradingDetail entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiAppBundle:GradingDetail')->findAll();

        return $this->render('EsteiAppBundle:GradingDetail:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new GradingDetail entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new GradingDetail();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('grading_detail_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiAppBundle:GradingDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a GradingDetail entity.
     *
     * @param GradingDetail $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GradingDetail $entity)
    {
        $form = $this->createForm(new GradingDetailType(), $entity, array(
            'action' => $this->generateUrl('grading_detail_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GradingDetail entity.
     *
     */
    public function newAction()
    {
        $entity = new GradingDetail();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiAppBundle:GradingDetail:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a GradingDetail entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:GradingDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GradingDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:GradingDetail:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing GradingDetail entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:GradingDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GradingDetail entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:GradingDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a GradingDetail entity.
    *
    * @param GradingDetail $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GradingDetail $entity)
    {
        $form = $this->createForm(new GradingDetailType(), $entity, array(
            'action' => $this->generateUrl('grading_detail_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GradingDetail entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:GradingDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GradingDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('grading_detail_edit', array('id' => $id)));
        }

        return $this->render('EsteiAppBundle:GradingDetail:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a GradingDetail entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiAppBundle:GradingDetail')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GradingDetail entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('grading_detail'));
    }

    /**
     * Creates a form to delete a GradingDetail entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grading_detail_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
