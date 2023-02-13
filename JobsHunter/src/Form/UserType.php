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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', CollectionType::class,[
                'entry_type'   => ChoiceType::class,
                'label' => 'Role',
                'entry_options'  => [
                    'choices'  => [
                        'Seeker' => 'ROLE_SEEKER',
                        'Company'     => 'ROLE_COMPANY',
                    ],
                ],
            ])
            ->add('password', PasswordType::class,[

            ])
            // ->add('createdAt')
            ->add('username')
            // ->add('company')
            // ->add('Seeker')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
