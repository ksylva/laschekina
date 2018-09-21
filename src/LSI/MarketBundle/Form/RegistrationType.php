<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 16/07/2018
 * Time: 14:16
 */

namespace LSI\MarketBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'mapped' => false,
                'choices' => array('Mairie' => 'mairie', 'Administré' => 'administre'),
                    'expanded' => true, 'multiple' => false
                ))
            ->add('nom', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                    new Length(array(
                            'min' => 5,
                            'max' => 15,
                            'minMessage' => "Le nom doit comporter au moins {{ limit }} caractères",
                            'maxMessage' => "Le nom ne doit pas comporter plus de {{ limit }} caractères"
                        )
                    )
                )
            ))
            ->add('indicatif', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                    new Regex(array(
                        'pattern' => "/^[\d]*$/",
                        'match' => true,
                        'message' => "L'indicatif est invalide"
                    )),
                    new Length(array(
                        'min' => 1,
                        'max' => 4,
                        'minMessage' => "L'indicatif doit comporter {{ limit }} caractères",
                        'maxMessage' => "L'indicatif ne doit pas comporter plus de {{ limit }} caractères"
                    ))
                )
            ))
            ->add('langue', LanguageType::class, array(
                'empty_data' => 'Sélectionner votre langue',
                'preferred_choices' => ['fr', 'en', 'de'],
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('telephone', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                    new Regex(array(
                        'pattern' => "/^[\d]*$/",
                        'match' => true,
                        'message' => "Le numéro est invalide"
                    )),
                    new Length(array(
                        'min' => 8,
                        'max' => 15,
                        'minMessage' => "Le numéro doit comporter {{ limit }} caractères",
                        'maxMessage' => "Le numéro ne doit pas comporter plus de {{ limit }} caractères"
                    ))
                )
            ))
            ->add('adresse', AdresseType::class)


            ->add('mairie', MairieType::class, array('required' => false))
            ->add('administre', AdministreType::class, array('required' => false))
            /*->add('cgu', CheckboxType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                /*'choices' => array('Acceptez les ' =>'1'),
                'expanded' => true, 'multiple' => true
                'label' => 'Acceptez les ',
            ))*/
            ;

        $builder->remove('cgu');

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