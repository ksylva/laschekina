<?php

namespace LSI\MarketBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConditionsGeneralesVentesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cgv', TextareaType::class, array(
            'label' => 'Texte',
            'attr' => array(
                'class' => 'tinymce',
                'data-theme' => 'advanced',
                'rows' => '25',
            )
        ))
            ->add('save', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LSI\MarketBundle\Entity\ConditionsGeneralesVentes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lsi_marketbundle_conditionsgeneralesventes';
    }


}
