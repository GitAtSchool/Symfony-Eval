<?php

namespace Estei\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\AppBundle\Entity\StudentClass;
use Estei\AppBundle\Form\StudentClassType;

/**
 * StudentClass controller.
 *
 */
class StudentClassController extends Controller
{

    /**
     * Lists all StudentClass entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiAppBundle:StudentClass')->findAll();

        return $this->render('EsteiAppBundle:StudentClass:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new StudentClass entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new StudentClass();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('student_class_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiAppBundle:StudentClass:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a StudentClass entity.
     *
     * @param StudentClass $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(StudentClass $entity)
    {
        $form = $this->createForm(new StudentClassType(), $entity, array(
            'action' => $this->generateUrl('student_class_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new StudentClass entity.
     *
     */
    public function newAction()
    {
        $entity = new StudentClass();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiAppBundle:StudentClass:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StudentClass entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:StudentClass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClass entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:StudentClass:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StudentClass entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:StudentClass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClass entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:StudentClass:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a StudentClass entity.
    *
    * @param StudentClass $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(StudentClass $entity)
    {
        $form = $this->createForm(new StudentClassType(), $entity, array(
            'action' => $this->generateUrl('student_class_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing StudentClass entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:StudentClass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClass entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('student_class_edit', array('id' => $id)));
        }

        return $this->render('EsteiAppBundle:StudentClass:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a StudentClass entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiAppBundle:StudentClass')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StudentClass entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('student_class'));
    }

    /**
     * Creates a form to delete a StudentClass entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('student_class_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
