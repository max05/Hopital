<?php

namespace PPE\HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PatientType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mdp','text',array('label'=>'Saisir un mot de passe :'))
            ->add('nom','text',array('label'=>'Saisir un nouveau nom :'))
            ->add('prenom','test',array('label'=>'Saisir un nouveau prénom :'))
            ->add('save','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPE\HopitalBundle\Entity\Patient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ppe_hopitalbundle_patient';
    }
}
