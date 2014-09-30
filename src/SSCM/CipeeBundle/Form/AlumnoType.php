<?php

namespace SSCM\CipeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombAlmn')
            ->add('apellAlmn')
            ->add('telfAlmn')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SSCM\CipeeBundle\Entity\Alumno'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sscm_cipeebundle_alumno';
    }
}
