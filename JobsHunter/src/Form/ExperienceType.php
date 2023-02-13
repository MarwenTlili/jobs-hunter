<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', TextType::class, [
                'required' => true,
            ])
            ->add('jobTitle', TextType::class, [
                'required' => true,
            ])
            ->add('yearsOfExperience')
            ->add('startAt', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('endAt', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'row_attr' => [
                    'id' => 'experience_end'
                ]
            ])
            ->add('current', CheckboxType::class, [
                'label' => 'En Cours ...',
                'required' => false,
            ])
            ->add('description', TextareaType::class, [
                'required' => true,
            ])
            // ->add('cv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
