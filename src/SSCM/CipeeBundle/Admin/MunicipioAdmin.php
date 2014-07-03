<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MunicipioAdmin extends Admin
{
    /*protected $baseRouteName = 'sonata_municipio';*/
    /*protected $baseRoutePattern = 'municipio';*/

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('codiMuni')
            ->add('nombMuni')
            ->add('codiEje')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Municipio')
                ->add('nombMuni')
            ->end()
        ;
    }

    protected function configureDatagridFields(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombMuni')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            /*->add('codiMuni')
            ->add('codiEje')*/
            ->add('nombMuni')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array()
                )
            ))
        ;
    }
}
