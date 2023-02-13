<?php

namespace App\Form;

use App\Entity\Seeker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeekerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('birthDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('country')
            ->add('civility')
            ->add('address')
            // ->add('user')
            // ->add('savedJobs')
            // ->add('applyedJobs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Seeker::class,
        ]);
    }
}
