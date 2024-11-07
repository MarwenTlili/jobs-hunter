<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\GeneralInformation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class GeneralInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', FileType::class, [
                'label' => 'votre photo (jpeg/png)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/svg+xml'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid Image file (jpeg/png/svg) with maximum size of 1024k|1m',
                    ])
                ]
            ])
            ->add('motivation', TextareaType::class, [])
            ->add('country', EntityType::class, [
                'class' => Country::class,
            ])
            ->add('address', TextType::class, [])
            ->add('region', TextType::class, [])
            ->add('postalCode', NumberType::class, [])
            ->add('haveDrivingLicence')
            ->add('ownACar')
            ->add('phone', TextType::class, [])
            ->add('phone2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GeneralInformation::class,
        ]);
    }
}
