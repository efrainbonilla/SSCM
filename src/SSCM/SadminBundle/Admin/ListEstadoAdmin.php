<?php

namespace SSCM\SadminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ListEstadoAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'listpais';
    }

    /*protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nombEdo')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Estado')
                ->add('nombEdo')
                ->add('codiPais')
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('nombEdo')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    public function configureDatagridFields(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombEdo')
        ;
    }*/
}
