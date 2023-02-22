<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Job;
use App\Entity\Profession;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    private $job;

    public function __constract(Job $job)
    {
        $this->job = $job;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true
            ])
            ->add('address')
            // ->add('createdAt')
            // ->add('expireAt', DateTimeType::class, [
            //     'widget' => 'single_text',
            //     'input'  => 'datetime_immutable',
            //     'required' => true
            // ])
            ->add('expireAt', DateType::class, [
                'widget' => 'single_text',
                'input'  => 'datetime_immutable',
                'required' => true
            ])
            ->add('postsNumber')
            ->add('type')
            ->add('experienceMin')
            ->add('experienceMax')
            ->add('educationLevel')
            ->add('requiredLanguages')
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'Description d\'emploi',
                'attr' => ['hidden' => true],
            ])
            ->add('requirements', TextareaType::class, [
                'required' => false,
                'label' => 'Exigences de l\'emploi',
                'attr' => ['hidden' => true],
            ])
            ->add('tags', EntityType::class,[
                'class' => Tag::class,
                'attr' => [
                    'class' => 'selectpicker', 'data-live-search' => 'true'
                ],
                'multiple' => true,
                'required' => false,
            ])

            // ->add('seekersSaved')
            // ->add('seekersApplyed')
            ->add('Company', EntityType::class, [
                'class' => Company::class,
                'disabled' => true,
                'required' => true
            ])
            ->add('country')
            ->add('professions', EntityType::class,[
                'class' => Profession::class,
                'attr' => [
                    'class' => 'selectpicker', 'data-live-search' => 'true',
                    'data-max-options' => 3
                ],
                'multiple' => true,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
