<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Employe;
use App\Entity\Adresse;

class EmployeFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $adresse1 = new Adresse();
        $adresse1->setRue("310 rue des Mimosas");
        $adresse1->setCodePostal(98830);
        $adresse1->setVille("Dumbéa");
        $manager->persist($adresse1);

        $employe1 = new Employe();
        $employe1->setNom("Loubriat");
        $employe1->setPrenom("Flavien");
        $employe1->setAdresse($adresse1);
        $manager->persist($employe1);

        $manager->flush();
    }
}
