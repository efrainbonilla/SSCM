<?php

namespace SSCM\CipeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstadoAcademicoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estatus')
            ->add('almn')
            ->add('malla')
            ->add('aldea')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SSCM\CipeeBundle\Entity\EstadoAcademico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sscm_cipeebundle_estadoacademico';
    }
}
