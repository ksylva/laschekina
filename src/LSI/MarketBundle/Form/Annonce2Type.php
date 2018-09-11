<?php

namespace LSI\MarketBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Annonce2Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pulicMairie', ChoiceType::class, array(
                'label' => 'Public cible : Mairie',
                'placeholder' => 'Sélectionner la restriction sur les mairies',
                'choices' => array(
                    'Les mairies de mon EPCI' => 'EPCI',
                    'Les autres Mairies' => 'Non_EPCI'
                )
            ))
            ->add('pulicAdministre', ChoiceType::class, array(
                'label' => 'Public cible : Administré',
                'placeholder' => 'Sélectionner la restriction sur les administrés',
                'choices' => array(
                    'Les Administrés de mon EPCI' => 'Adminis_EPCI',
                    'Les autres Administrés' => 'Adminis_non_EPCI',
                    'Pas aux Administrés' => 'Aucun'
                )
            ))
            ->add('calendrier', CalendrierType::class, array(
                /*'entry_type' => CalendrierType::class,
                'allow_add' => true,
                'allow_delete' => false*/
                'data_class' => null)
            )
            ->add('tarifAdminisEpci',MoneyType::class, array(
                'label' => 'Tarif'
            ))
            ->add('tarifNonAdminisEpci', MoneyType::class, array(
                'label' => 'Tarif'
            ))
            ->add('tarifNonAdminis', MoneyType::class, array(
                'label' => 'Tarif'
            ))
            ->add('tarifEpci', MoneyType::class, array(
                'label' => 'Tarif'
            ))
            ->add('tarifNonEpci', MoneyType::class, array(
                'label' => 'Tarif'
            ))

            ->add('save', SubmitType::class, array());


        $builder
            ->remove('dateCreation')
            ->remove('annonceUpdateAt')
            ->remove('mairie');
        //->remove('dateCreation');
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LSI\MarketBundle\Entity\Annonce'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lsi_marketbundle_annonce';
    }


}
