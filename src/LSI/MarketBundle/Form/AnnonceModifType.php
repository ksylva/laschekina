<?php

namespace LSI\MarketBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceModifType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('regleCond')
            ->add('prixDefaut')
            ->add('typeAnnul')
            ->add('calendrier')
            ->add('pulicMairie')
            ->add('pulicAdministre')
            ->add('categorie', EntityType::class, array(
                'class' => 'LSIMarketBundle:Categorie'
            ))
            ->add('adresse');

        $builder
            ->remove('dateCreation')
            ->remove('heureCreation')
            ->remove('annonceUpdateAt')
            ->remove('annonceEtat')
            ->remove('mairie')
            ->remove('tarifAdminisEpci')
            ->remove('tarifNonAdminisEpci')
            ->remove('tarifNonAdmins')
            ->remove('tarifEpci')
            ->remove('tarifNonEpci');;
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
