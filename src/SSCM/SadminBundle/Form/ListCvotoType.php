<?php

namespace SSCM\SadminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListCvotoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombCvoto')
            ->add('codiCvoto')
            ->add('codiParroq')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SSCM\SadminBundle\Entity\ListCvoto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sscm_sadminbundle_listcvoto';
    }
}
