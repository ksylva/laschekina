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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ProfileFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
                        'minMessage' => "L'indicatif doit comporter {{ limmit }} caractères",
                        'maxMessage' => "L'indicatif ne doit pas comporter plus de {{ limit }} caractères"
                    ))
                )
            ))
            ->add('langue', LanguageType::class, array(
                'preferred_choices' => array('de','en','fr'),
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
                        'minMessage' => "Le numéro doit comporter {{ limmit }} caractères",
                        'maxMessage' => "Le numéro ne doit pas comporter plus de {{ limit }} caractères"
                    ))
                )
            ))
            ->add('adresse', AdresseType::class)
            ;
        $builder
            ->remove('cgu');

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
                    }elseif($user->getRoles() === ['ROLE_ADMIN'] || $user->getRoles() === ['ROLE_SUPER_ADMIN']){
                        $event->getForm()
                            ->remove('mairie')
                            ->remove('administre')
                            ->remove('adresse')
                            ->remove('nom')
                            ->remove('indicatif')
                            ->remove('langue')
                            ->remove('telephone')
                            ;
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