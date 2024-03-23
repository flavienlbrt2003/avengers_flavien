<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Adresse;
use App\Entity\Employe;


class EmployeType extends AbstractType{
    
    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('adresse', AdresseType::class)
            ->add('Valider', SubmitType::class);
    }

    public function configureOptions (OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}