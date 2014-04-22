<?php

namespace SSCM\SadminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SSCM\SadminBundle\Entity\ListEstado;
use SSCM\SadminBundle\Form\ListEstadoType;

/**
 * ListEstado controller.
 *
 * @Route("/estados")
 */
class ListEstadoController extends Controller
{

    /**
     * Lists all ListEstado entities.
     *
     * @Route("/", name="estado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SadminBundle:ListEstado')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ListEstado entity.
     *
     * @Route("/", name="estado_create")
     * @Method("POST")
     * @Template("SadminBundle:ListEstado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ListEstado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estado_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ListEstado entity.
    *
    * @param ListEstado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ListEstado $entity)
    {
        $form = $this->createForm(new ListEstadoType(), $entity, array(
            'action' => $this->generateUrl('estado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ListEstado entity.
     *
     * @Route("/new", name="estado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ListEstado();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ListEstado entity.
     *
     * @Route("/{id}", name="estado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListEstado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ListEstado entity.
     *
     * @Route("/{id}/edit", name="estado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListEstado entity.');
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
    * Creates a form to edit a ListEstado entity.
    *
    * @param ListEstado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ListEstado $entity)
    {
        $form = $this->createForm(new ListEstadoType(), $entity, array(
            'action' => $this->generateUrl('estado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ListEstado entity.
     *
     * @Route("/{id}", name="estado_update")
     * @Method("PUT")
     * @Template("SadminBundle:ListEstado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListEstado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ListEstado entity.
     *
     * @Route("/{id}", name="estado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SadminBundle:ListEstado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ListEstado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estado'));
    }

    /**
     * Creates a form to delete a ListEstado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
