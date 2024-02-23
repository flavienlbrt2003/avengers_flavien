<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;
use App\Entity\Auteur;

class L extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $auteur = new Auteur();
            $auteur->setNom('Nom '.$i);
            $auteur->setPrenom('Auteur '.$i);
            $manager->persist($auteur);

            $livre = new Livre();
            $livre->setTitre('Livre '.$i);
            $livre->setAuteurId($auteur);
            $livre->setDateParution(new \DateTime());
            $livre->setNbPages(mt_rand(45, 1500));
            $manager->persist($livre);
        } 
        $manager->flush();
    }
}
