<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 16/07/2018
 * Time: 14:16
 */

namespace LSI\MarketBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'mapped' => false,
                'choices' => array('Mairie' => 'mairie', 'Administré' => 'administre'),
                    'expanded' => true, 'multiple' => false
                ))
            ->add('nom', TextType::class)
            ->add('indicatif', TextType::class)
            ->add('langue', LanguageType::class, array(
                'empty_data' => 'Sélectionner votre langue',
                'preferred_choices' => ['fr', 'en', 'de'],

                //'empty_data' => 'Sélectionner votre langue',
            ))
            ->add('telephone', TextType::class)
            //->add('adresse', TextType::class)
            //->add('ville', TextType::class)
            /*->add('pays', CountryType::class, array(
                        'preferred_choices' => ['fr', 'en', 'de'],
                        'empty_data' => 'Sélectionner votre pays',
                    ))*/
            ->add('mairie', MairieType::class, array('required' => false))
            ->add('administre', AdministreType::class, array('required' => false))
            ;

        // Ajout
        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event){
                // On recupere les informations de la vue
                $user = $event->getData();
                
                // Si $user est null, on retourne
                if (null === $user){
                    return;
                }

                // Teste la valeur de type
                if ($user['type'] === 'mairie'){ // Si null, alors il s'agit d'une mairie
                    $event->getForm()->remove('administre'); // Puis on retire l'attribut 'administre' du formulaire

                }elseif ($user['type'] === 'administre'){ // Idem
                    $event->getForm()->remove('mairie');
                }
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'allow_extra_fields' => true,
            
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'market_user_registration';
    }
}