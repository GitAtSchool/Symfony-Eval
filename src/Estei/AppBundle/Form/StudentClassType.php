<?php

namespace Estei\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentClassType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nameAbbrev')
            //->add('slug')
            //->add('position')
            //->add('createdAt')
            //->add('updatedAt')
            ->add('degree')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estei\AppBundle\Entity\StudentClass'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estei_appbundle_studentclass';
    }
}
