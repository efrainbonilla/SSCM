<?php

namespace SSCM\SadminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SSCM\SadminBundle\Entity\ListEje;
use SSCM\SadminBundle\Form\ListEjeType;

/**
 * ListEje controller.
 *
 * @Route("/listeje")
 */
class ListEjeController extends Controller
{

    /**
     * Lists all ListEje entities.
     *
     * @Route("/", name="listeje")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SadminBundle:ListEje')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ListEje entity.
     *
     * @Route("/", name="listeje_create")
     * @Method("POST")
     * @Template("SadminBundle:ListEje:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ListEje();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('listeje_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ListEje entity.
    *
    * @param ListEje $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ListEje $entity)
    {
        $form = $this->createForm(new ListEjeType(), $entity, array(
            'action' => $this->generateUrl('listeje_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ListEje entity.
     *
     * @Route("/new", name="listeje_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ListEje();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ListEje entity.
     *
     * @Route("/{id}", name="listeje_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListEje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListEje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ListEje entity.
     *
     * @Route("/{id}/edit", name="listeje_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListEje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListEje entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ListEje entity.
    *
    * @param ListEje $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ListEje $entity)
    {
        $form = $this->createForm(new ListEjeType(), $entity, array(
            'action' => $this->generateUrl('listeje_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ListEje entity.
     *
     * @Route("/{id}", name="listeje_update")
     * @Method("PUT")
     * @Template("SadminBundle:ListEje:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListEje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListEje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('listeje_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ListEje entity.
     *
     * @Route("/{id}", name="listeje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SadminBundle:ListEje')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ListEje entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('listeje'));
    }

    /**
     * Creates a form to delete a ListEje entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listeje_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
