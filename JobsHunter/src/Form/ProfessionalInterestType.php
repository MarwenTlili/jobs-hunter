<?php

namespace App\Form;

use App\Entity\Profession;
use App\Entity\ProfessionalInterest;
use App\Repository\ProfessionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfessionalInterestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level', TextType::class, [
                // 'data' => "level 1"
            ])
            ->add('jobType', TextType::class, [
                // 'data' => "CDI"
            ])
            ->add('wantedOccupation', TextType::class, [
                // 'data' => "Dev Web"
            ])
            ->add('wantedSalary', NumberType::class, [
                // 'data' => "2500"
            ])
            ->add('actualStatus', TextType::class, [
                // 'data' => "status 1"
            ])
            ->add('findMeByCompany', CheckboxType::class, [
                'required' => false,
            ])
            ->add('professions', EntityType::class, array(
                'class' => Profession::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'selectpicker', 'data-live-search' => 'true'
                ],
                'multiple' => true,
                'required' => false,
            ))
            
            // ->add('cv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProfessionalInterest::class,
        ]);
    }
}
