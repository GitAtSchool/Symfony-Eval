<?php

namespace Estei\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\AppBundle\Entity\Period;
use Estei\AppBundle\Form\PeriodType;

/**
 * Period controller.
 *
 */
class PeriodController extends Controller
{

    /**
     * Lists all Period entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiAppBundle:Period')->findAll();

        return $this->render('EsteiAppBundle:Period:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Period entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Period();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('period_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiAppBundle:Period:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Period entity.
     *
     * @param Period $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Period $entity)
    {
        $form = $this->createForm(new PeriodType(), $entity, array(
            'action' => $this->generateUrl('period_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Period entity.
     *
     */
    public function newAction()
    {
        $entity = new Period();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiAppBundle:Period:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Period entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:Period')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Period entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:Period:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Period entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:Period')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Period entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiAppBundle:Period:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Period entity.
    *
    * @param Period $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Period $entity)
    {
        $form = $this->createForm(new PeriodType(), $entity, array(
            'action' => $this->generateUrl('period_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Period entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiAppBundle:Period')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Period entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('period_edit', array('id' => $id)));
        }

        return $this->render('EsteiAppBundle:Period:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Period entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiAppBundle:Period')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Period entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('period'));
    }

    /**
     * Creates a form to delete a Period entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('period_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
