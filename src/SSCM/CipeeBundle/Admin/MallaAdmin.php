<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MallaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('codiMalla')
            ->add('nombMalla')
            ->add('codiPfg', null, array(
                'label' => 'filter.label_nomb_pfg'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('codiMalla')
            ->add('nombMalla')
            ->add('codiPfg.nombPfg', null, array(
                'label' => 'list.label_nomb_pfg'
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
            ->add('codiMalla')
            ->add('nombMalla')
            ->add('codiPfg', null, array(
                'label' => 'form.label_nomb_pfg'
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('codiMalla')
            ->add('nombMalla')
            ->add('codiPfg', null, array(
                'label' => 'show.label_nomb_pfg'
            ))
        ;
    }
}
