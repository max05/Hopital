<?php

namespace PPE\HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RdvType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('etat')
            ->add('lePatient')
            ->add('leMedecin')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPE\HopitalBundle\Entity\Rdv'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ppe_hopitalbundle_rdv';
    }
}
