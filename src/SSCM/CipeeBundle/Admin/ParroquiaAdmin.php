<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ParroquiaAdmin extends Admin
{
    /*protected $baseRouteName = 'sonata_parroquia';*/
    /*protected $baseRoutePattern = 'parroquia';*/


    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('codiParroq')
            ->add('nombParroq')
            /*->add('codiMuni')*/
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            /*->add('codiParroq')
            ->add('codiMuni')*/
            ->add('nombParroq')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array()
                )
            ))
        ;
    }

    protected function configureDatagridFields(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('codiParroq')
            ->add('nombParroq')
            ->add('codiMuni', 'sonata_type_model')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Parrquia')
                ->add('codiParroq')
                ->add('nombParroq')
                ->add('codiMuni')
            ->end()
        ;
    }
}
