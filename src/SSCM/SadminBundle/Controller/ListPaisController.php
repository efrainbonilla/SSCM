<?php

namespace SSCM\SadminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SSCM\SadminBundle\Entity\ListPais;
use SSCM\SadminBundle\Form\ListPaisType;

/**
 * ListPais controller.
 *
 * @Route("/pais")
 */
class ListPaisController extends Controller
{

    /**
     * Lists all ListPais entities.
     *
     * @Route("/", name="region")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SadminBundle:ListPais')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ListPais entity.
     *
     * @Route("/", name="region_create")
     * @Method("POST")
     * @Template("SadminBundle:ListPais:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ListPais();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('region_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ListPais entity.
    *
    * @param ListPais $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ListPais $entity)
    {
        $form = $this->createForm(new ListPaisType(), $entity, array(
            'action' => $this->generateUrl('region_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ListPais entity.
     *
     * @Route("/new", name="region_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ListPais();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ListPais entity.
     *
     * @Route("/{id}", name="region_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListPais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListPais entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ListPais entity.
     *
     * @Route("/{id}/edit", name="region_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListPais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListPais entity.');
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
    * Creates a form to edit a ListPais entity.
    *
    * @param ListPais $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ListPais $entity)
    {
        $form = $this->createForm(new ListPaisType(), $entity, array(
            'action' => $this->generateUrl('region_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ListPais entity.
     *
     * @Route("/{id}", name="region_update")
     * @Method("PUT")
     * @Template("SadminBundle:ListPais:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListPais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListPais entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('region_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ListPais entity.
     *
     * @Route("/{id}", name="region_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SadminBundle:ListPais')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ListPais entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('region'));
    }

    /**
     * Creates a form to delete a ListPais entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('region_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
