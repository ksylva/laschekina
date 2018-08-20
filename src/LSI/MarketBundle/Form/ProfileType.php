<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 19/07/2018
 * Time: 12:59
 */

namespace LSI\MarketBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProfileType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('indicatif', TextType::class)
            ->add('langue', LanguageType::class, array('preferred_choices' => array('de','en','fr')))
            ->add('telephone', TextType::class)
            ->add('adresse', TextType::class)
            ->add('pays', CountryType::class, array('preferred_choices' => array('de', 'en', 'fr')))
            ;

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event){
                $user = $event->getData();

                if (null === $user){ return; }

                if ($user->getUsername() || null !== $user->getId()){
                    if ($user->getRoles() === ['ROLE_PART']){
                        $event->getForm()->remove('mairie');
                        $event->getForm()->add('administre', AdministreType::class, array('required' => false));
                    }elseif ($user->getRoles() === ['ROLE_MAIRIE']){
                        $event->getForm()->remove('administre');
                        $event->getForm()->add('mairie', MairieType::class, array('required' => false));
                    }
                }
            }
        );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'market_user_profile';
    }
}