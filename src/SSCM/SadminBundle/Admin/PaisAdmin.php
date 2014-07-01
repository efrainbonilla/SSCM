<?php

namespace SSCM\SadminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PaisAdmin extends Admin
{
    protected $baseRouteName = 'sonata_pais';

    /*protected $baseRoutePattern = 'pais';*/

    protected $translationDomain = 'SonataPageBundle';

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nombPais')
            ->add('latPais')
            ->add('lngPais')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->with('Región')
                ->add('nombPais', 'text', array('label' => 'Pais'))
                ->add('latPais', 'integer', array('label' => 'Latitud'))
                ->add('lngPais', 'integer', array('label' => 'Longitud'))
            ->end()

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('nombPais', 'text', array('label' => 'Pais'))
            ->add('latPais')
            ->add('lngPais')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombPais')
        ;
    }
}
