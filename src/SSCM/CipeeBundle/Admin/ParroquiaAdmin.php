<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

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
            ->add('codiMuni', 'doctrine_orm_callback', array(
                'label' => 'filter.label_nomb_muni',
                'callback' => function($queryBuilder, $alias, $field, $value) {
                    if (empty($value['value']))
                        return;

                    $queryBuilder
                        ->innerJoin('CipeeBundle:Municipio', 'm', 'WITH', $alias.'.codiMuni = m.codiMuni')
                        ->where(sprintf('m.nombMuni = %s', $alias))
                    ;
                    /*$queryBuilder->from('CipeeBundle:Municipio', 'm')
                            ->innerJoin('CipeeBundle:Parroquia', 'p', 'WITH', 'm.codiMuni = p.codiMuni')
                            ->where(sprintf('m.codiMuni = %s', $alias));*/

                    /*$search = new \WF\WFAdminBundle\Search\SearchName();
                    $search($queryBuilder, 'con', $field, $value);*/
                    return true;
                },
                'type' => null
            ))
            ->add('codiMuni.codiEdo', null, array(
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
            ->add('codiMuni.nombMuni', 'text', array(
                'label' => 'list.label_nomb_muni'
            ))
            ->add('codiMuni.codiEdo.nombEdo', 'text', array(
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
                ->add('codiMuni', null, array(
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
            ->add('codiMuni', null, array(
                'label' => 'list.label_nomb_muni'
            ))
            ->add('codiMuni.codiEdo', null, array(
                'label' => 'list.label_nomb_edo'
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getExportFields()
    {
        return array(
            'CÓDIGO PARROQUIA' => 'codiParroq',
            'PARROQUIA' => 'nombParroq',
            'MUNICIPIO' => 'codiMuni',
            'ESTADO' => 'codiMuni.codiEdo.nombEdo'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        /*$errorElement
            ->with('codiParroq')
                ->assertNotBlank()
            ->end()
        ;*/
    }
}
