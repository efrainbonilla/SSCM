<?php

namespace SSCM\SadminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EstadoAdmin extends Admin
{
    /**
     * The related field reflection, ie if OrderElement is linked to Order,
     * then the $parentReflectionProperty must be the ReflectionProperty of
     * the order (OrderElement::$order)
     *
     * @var \ReflectionProperty $parentReflectionProperty
     */
    protected $parentAssociationMapping = 'pais';

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nombEdo', 'text', array('label' => $this->getBaseControllerName()))
            ->add('id', 'sonata_type_model_list')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Estado')
                ->add('nombEdo')
                ->add('codiPais', 'sonata_type_model_list')
            ->end()
        ;
    }

   /* public function configureDatagridFields(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombEdo')
        ;
    }*/

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('nombEdo', null, array('label' => 'Estado'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
}
