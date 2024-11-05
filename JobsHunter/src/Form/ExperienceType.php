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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Mime\Message;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ExperienceType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('company', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'nom de l\'entreprise ne doit pas être vide'
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'nom de l\'entreprise doit comporter plus de 3 caractères'
                    ])
                ]
            ])
            ->add('jobTitle', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'le titre ne doit pas être vide'
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'le titre doit comporter plus de 3 caractères'
                    ])
                ]
            ])
            ->add('experienceLevel', ChoiceType::class, [
                'choices' => [
                    'Interim' => 'INTERIM',
                    'Junior [0..2]' => 'JUNIOR',
                    'Mid [2..5]' => 'MID',
                    'Senior [5..10]' => 'SENIOR',
                    'Lead [10+]' => 'LEAD',
                ],
            ])
            ->add('startAt', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'date de debut ne doit pas être vide'
                    ])
                ]
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
                'attr' => ['class' => 'form-control tinymce', 'row' => 5],
                'constraints' => [
                    new NotBlank([
                        'message' => 'description ne peut pas être vide!'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
