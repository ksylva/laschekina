<?php

namespace LSI\MarketBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendrierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('debut', DateType::class, array(
                'input' => 'datetime',
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y') + 2),
                'months' => range(date('m'), date('m') + 11),
            ))
            ->add('fin', DateType::class, array(
                'input' => 'datetime',
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y') + 2),
                'months' => range(date('m'), date('m') + 11),
            ))
            ->add('statut', ChoiceType::class, array(
                'placeholder' => 'Sélectionner le statut de l\'annonce',
                'choices' => array(
                    'Indéterminé' => 'indéterminé',
                    'Déterminé' => 'déterminé',
                    'Indisponible' => 'indisponible',
                    'Disponible' => 'disponible'
                )
            ));
            //->add('annonce');
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LSI\MarketBundle\Entity\Calendrier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lsi_marketbundle_calendrier';
    }


}
