<?php

namespace Estei\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\AppBundle\Entity\Grading;
use Estei\AppBundle\Form\GradingType;

/**
 * Grading controller.
 *
 */
class GradingController extends Controller
{

    /**
     * Lists all Grading entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiAppBundle:Grading')->findAll();

        return $this->render('EsteiAppBundle:Grading:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Grading entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Grading();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('grading_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiAppBundle:Grading:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Grading entity.
     *
     * @param Grading $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Grading $entity)
    {
        $form = $this->createForm(new GradingType(), $entity, array(
            'action' => $this->generateUrl('grading_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Grading entity.
     *
     */
    public function newAction()
    {
        $entity = new Grading();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiAppBundle:Grading:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Grading entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:Grading')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grading entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:Grading:show_session_student_chart.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Grading entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:Grading')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grading entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:Grading:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Grading entity.
    *
    * @param Grading $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Grading $entity)
    {
        $form = $this->createForm(new GradingType(), $entity, array(
            'action' => $this->generateUrl('grading_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Grading entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:Grading')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grading entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('grading_edit', array('id' => $id)));
        }

        return $this->render('EsteiAppBundle:Grading:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Grading entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiAppBundle:Grading')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Grading entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('grading'));
    }

    /**
     * Creates a form to delete a Grading entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grading_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
