<?php

namespace App\Form;

use App\Entity\Education;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diplomaTitle')
            ->add('establishment')
            ->add('educationLevel')
            ->add('startAt', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('endAt', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'row_attr' => [
                    'id' => 'education_end'
                ]
            ])
            ->add('current')
            // ->add('cv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}
