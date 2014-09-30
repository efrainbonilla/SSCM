<?php

namespace SSCM\SadminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaisType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombPais')
            ->add('latPais')
            ->add('lngPais')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SSCM\SadminBundle\Entity\Pais'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sscm_sadminbundle_listpais';
    }
}
