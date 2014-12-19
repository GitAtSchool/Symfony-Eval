<?php

namespace Estei\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Estei\AppBundle\Entity\GradingDetail;

class GradingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment')
            //->add('createdAt')
            //->add('updatedAt')
            ->add('examinationSession')
            ->add('user')
            ->add('gradingDetail', 'collection', array(
                'type' => new GradingDetailType(),
                'allow_add'  => true,
        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estei\AppBundle\Entity\Grading'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estei_appbundle_grading';
    }
}
