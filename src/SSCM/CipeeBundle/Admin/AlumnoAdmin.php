<?php

namespace SSCM\CipeeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DatagridBundle\ProxyQuery\Doctrine\ProxyQuery;

class AlumnoAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAlias();
        $query
            ->addSelect(array('ea'))
            ->innerJoin('CipeeBundle:EstadoAcademico', 'ea',  'WITH', $alias . '.ceduAlmn = ea.ceduAlmn')
        ;

        return $query;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('ceduAlmn')
            ->add('nombAlmn')
            ->add('apellAlmn')
            ->add('telfAlmn')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('ceduAlmn')
            ->add('nombAlmn')
            ->add('apellAlmn')
            ->add('telfAlmn')
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
            ->add('ceduAlmn')
            ->add('nombAlmn')
            ->add('apellAlmn')
            ->add('telfAlmn')
            /*->add('codiAldea', 'sonata_type_model', array(
                'class' => 'SSCM\CipeeBundle\Entity\EstadoAcademico',
                'property' => 'codiAldea'
            ))*/
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('ceduAlmn')
            ->add('nombAlmn')
            ->add('apellAlmn')
            ->add('telfAlmn')
        ;
    }
    public function getExportFields()
    {
        return array(
            'CÉDULA' => 'ceduAlmn',
            'NOMBRE' => 'nombAlmn',
            'APELLIDO' => 'apellAlmn',
            'TELÉFONO' => 'telfAlmn'
        );
    }
}
