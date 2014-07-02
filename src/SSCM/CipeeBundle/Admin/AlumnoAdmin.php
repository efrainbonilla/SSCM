<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AlumnoAdmin extends Admin
{

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('ceduAlumno', 'text', array('label' => 'Cédula'))
            ->add('nombAlumno', 'text', array('label' => 'Nombre'))
            ->add('apellAlumno', 'text', array('label' => 'Apellido'))
            ->add('telfAlumno', 'text', array('label' => 'Teléfono'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('ceduAlumno')
            ->add('nombAlumno')
            ->add('apellAlumno')
            ->add('telfAlumno')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Estudiantes')
                ->add('ceduAlumno', 'text', array('label' => 'Cédula'))
                ->add('nombAlumno', 'text', array('label' => 'Nombre'))
                ->add('apellAlumno', 'text', array('label' => 'Apellido'))
                ->add('telfAlumno', 'text', array('label' => 'Teléfono'))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('ceduAlumno')
            ->add('nombAlumno')
            ->add('apellAlumno')
            ->add('telfAlumno')
        ;
    }
}
