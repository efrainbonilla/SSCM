<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MunicipioAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('codiMuni')
            ->add('nombMuni')
            ->add('edo', null, array(
                'label' => 'list.label_nomb_edo'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('codiMuni')
            ->add('nombMuni')
            ->add('edo.nombEdo', null, array(
                'label' => 'list.label_nomb_edo'
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('codiMuni')
            ->add('nombMuni')
            ->add('edo', null, array(
                'label' => 'list.label_nomb_edo',
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('codiMuni')
            ->add('nombMuni')
            ->add('edo', null, array(
                'label' => 'list.label_nomb_edo'
            ))
        ;
    }

    public function getExportFields()
    {
        return array( 'CÓDIGO MUNICIPIO' => 'codiMuni', 'MUNICIPIO' => 'nombMuni', 'ESTADO' => 'edo.nombEdo');
    }
}
