<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Adresse;


class AdresseType extends AbstractType{

    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder
            ->add('Rue', TextType::class)
            ->add('CodePostal', IntegerType::class)
            ->add('Ville', TextType::class);
    }
    
    public function configureOptions (OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}