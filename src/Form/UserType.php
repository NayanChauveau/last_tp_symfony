<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo')
            ->add('roles', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'label' => 'Choisissez un role',
                'entry_options'  => [
                    'label' => 'les roles',
                    'choices'  => [
                        'ROLE_ADMIN' => 'ROLE_ADMIN',
                        'ROLE_USER'     => 'ROLE_USER',
                        'ROLE_MODO'    => 'ROLE_MODO',
                        'ROLE_ECRIVAIN'    => 'ROLE_ECRIVAIN',
                    ],
                ],
            ])
            ->add('password', PasswordType::class)
            ->add('email')
            ->add('isVerified')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
