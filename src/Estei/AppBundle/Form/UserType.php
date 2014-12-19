<?php

namespace Estei\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            //->add('slug')
            ->add('birthDate')
            ->add('about')
            ->add('email')
            ->add('username')
            ->add('password')
            ->add('roles')
            ->add('isTeacher')
            ->add('isStudent')
            //->add('createdAt')
            //->add('updatedAt')
            ->add('studentClass')
            ->add('sex')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estei\AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estei_appbundle_user';
    }
}
