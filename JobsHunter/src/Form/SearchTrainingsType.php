<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchTrainingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword', TextType::class,[
                'label' => false, 
                'required' => false, 
                'data' => '', 
                'attr' => [
                    'placeholder' => 'keyword']
            ])
            ->add('address', TextType::class,[
                'label' => false, 
                'required' => false, 
                'data' => '', 
                'attr' => [
                    'placeholder' => 'address']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // Configure your form options here
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
