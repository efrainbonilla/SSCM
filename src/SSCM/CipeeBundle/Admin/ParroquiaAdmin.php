<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ParroquiaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $domain = $this->getTranslationDomain();

        $datagridMapper
            ->add('codiParroq', null)
            ->add('nombParroq', null)
            ->add('muni', null, array(
                'label' => 'filter.label_nomb_muni'
            ))
            ->add('muni.edo', null, array(
                'label' => 'filter.label_nomb_edo'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $domain = $this->getTranslationDomain();

        $listMapper
            ->add('codiParroq')
            ->add('nombParroq')
            ->add('muni.nombMuni', 'text', array(
                'label' => 'list.label_nomb_muni'
            ))
            ->add('muni.edo.nombEdo', 'text', array(
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
            ->with("list.label_parroq")

                ->add('codiParroq', null)
                ->add('nombParroq')
            ->end()
            ->with("list.label_muni")
                ->add('muni', null, array(
                'label' => 'list.label_nomb_muni',
                'attr' => array(
                    /*'data-sonata-select2' => 'false'*/
                    /*'multiple' => 'true'*/
                    'placeholder' => '[Seleccione Parroquia]'
                )
            ))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('codiParroq')
            ->add('nombParroq')
            ->add('muni', null, array(
                'label' => 'list.label_nomb_muni'
            ))
            ->add('muni.edo', null, array(
                'label' => 'list.label_nomb_edo'
            ))
        ;
    }

    public function getExportFields()
    {
        return array(
            'CÓDIGO PARROQUIA' => 'codiParroq',
            'PARROQUIA' => 'nombParroq',
            'MUNICIPIO' => 'muni',
            'ESTADO' => 'muni.edo.nombEdo'
        );
    }
}
