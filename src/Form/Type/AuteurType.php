<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

use App\Entity\Auteur;


class AuteurType extends AbstractType{
    
    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Valider', SubmitType::class);
    }

    public function configureOptions (OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}