<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Livre;


class LivreType extends AbstractType{
    
    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder
            ->add('titre', TextType::class, [
                'required' => true,
            ])
            ->add('dateParution', DateType::class)
            ->add('nbPages', IntegerType::class)
            ->add('Valider', SubmitType::class);
    }

    public function configureOptions (OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}