<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;
use App\Entity\Auteur;

class LivreFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Boucle pour créer des auteurs et des livres
        /* for ($i = 0; $i < 10; $i++) {
            $auteur = new Auteur();
            $auteur->setNom('Nom '.$i);
            $auteur->setPrenom('Auteur '.$i);
            $manager->persist($auteur);

            $livre = new Livre();
            $livre->setTitre('Livre '.$i);
            $livre->setAuteurId($auteur);
            $livre->setDateParution((new \DateTime())->setDate());
            $livre->setNbPages(mt_rand(45, 1500));
            $manager->persist($livre);
        }  */

        // Création de 10 auteurs et 16 livres en dure pour avoir des meilleurs données pour les tests.
        $auteur1 = new Auteur();
        $auteur1->setNom('Rowling');
        $auteur1->setPrenom('J.K.');
        $manager->persist($auteur1);

        $auteur2 = new Auteur();
        $auteur2->setNom('Brown');
        $auteur2->setPrenom('Dan');
        $manager->persist($auteur2);

        $auteur3 = new Auteur();
        $auteur3->setNom('Orwell');
        $auteur3->setPrenom('George');
        $manager->persist($auteur3);

        $auteur4 = new Auteur();
        $auteur4->setNom('Harper');
        $auteur4->setPrenom('Lee');
        $manager->persist($auteur4);

        $auteur5 = new Auteur();
        $auteur5->setNom('Fitzgerald');
        $auteur5->setPrenom('F.Scott');
        $manager->persist($auteur5);

        $auteur6 = new Auteur();
        $auteur6->setNom('Salinger');
        $auteur6->setPrenom('J.D.');
        $manager->persist($auteur6);

        $auteur7 = new Auteur();
        $auteur7->setNom('King');
        $auteur7->setPrenom('Stephen');
        $manager->persist($auteur7);

        $auteur8 = new Auteur();
        $auteur8->setNom('Austen');
        $auteur8->setPrenom('Jane');
        $manager->persist($auteur8);

        $auteur9 = new Auteur();
        $auteur9->setNom('J.R.R.');
        $auteur9->setPrenom('Tolkien');
        $manager->persist($auteur9);

        $auteur10 = new Auteur();
        $auteur10->setNom('Collins');
        $auteur10->setPrenom('Suzanne');
        $manager->persist($auteur10);


        $livre0 = new Livre();
        $livre0->setTitre("Harry Potter and the Philosopher's Stone");
        $livre0->setAuteurId($auteur1);
        $livre0->setDateParution((new \DateTime())->setDate(1997, 06, 26));
        $livre0->setNbPages(223);
        $manager->persist($livre0);

        $livre1 = new Livre();
        $livre1->setTitre('Harry Potter and the Chamber of Secrets');
        $livre1->setAuteurId($auteur1);
        $livre1->setDateParution((new \DateTime())->setDate(1998, 07, 02));
        $livre1->setNbPages(251);
        $manager->persist($livre1);

        $livre2 = new Livre();
        $livre2->setTitre('Harry Potter and the Prisoner of Azkaban');
        $livre2->setAuteurId($auteur1);
        $livre1->setDateParution((new \DateTime())->setDate(1999, 07, 07));
        $livre2->setNbPages(317);
        $manager->persist($livre2);

        $livre3 = new Livre();
        $livre3->setTitre('Angels & Demons');
        $livre3->setAuteurId($auteur2);
        $livre3->setDateParution((new \DateTime())->setDate(2000, 05, 15));
        $livre3->setNbPages(620);
        $manager->persist($livre3);

        $livre4 = new Livre();
        $livre4->setTitre('Inferno');
        $livre4->setAuteurId($auteur2);
        $livre4->setDateParution((new \DateTime())->setDate(2013, 05, 14));
        $livre4->setNbPages(462);
        $manager->persist($livre4);

        $livre5 = new Livre();
        $livre5->setTitre('Carrie');
        $livre5->setAuteurId($auteur3);
        $livre5->setDateParution((new \DateTime())->setDate(1974, 04, 05));
        $livre5->setNbPages(199);
        $manager->persist($livre5);

        $livre6 = new Livre();
        $livre6->setTitre('The Shining');
        $livre6->setAuteurId($auteur4);
        $livre6->setDateParution((new \DateTime())->setDate(1977, 01, 28));
        $livre6->setNbPages(447);
        $manager->persist($livre6);

        $livre7 = new Livre();
        $livre7->setTitre('It');
        $livre7->setAuteurId($auteur5);
        $livre7->setDateParution((new \DateTime())->setDate(1986, 10, 15));
        $livre7->setNbPages(1138);
        $manager->persist($livre7);

        $livre8 = new Livre();
        $livre8->setTitre('Misery');
        $livre8->setAuteurId($auteur6);
        $livre8->setDateParution((new \DateTime())->setDate(1987, 06, 07));
        $livre8->setNbPages(320);
        $manager->persist($livre8);

        $livre9 = new Livre();
        $livre9->setTitre('The Green Mile');
        $livre9->setAuteurId($auteur7);
        $livre9->setDateParution((new \DateTime())->setDate(1997, 05, 15));
        $livre9->setNbPages(536);
        $manager->persist($livre9);

        $livre10 = new Livre();
        $livre10->setTitre('Under the Dome');
        $livre10->setAuteurId($auteur8);
        $livre10->setDateParution((new \DateTime())->setDate(2009, 11, 10));
        $livre10->setNbPages(1074);
        $manager->persist($livre10);

        $livre11 = new Livre();
        $livre11->setTitre('Doctor Sleep');
        $livre11->setAuteurId($auteur8);
        $livre11->setDateParution((new \DateTime())->setDate(2013, 10, 24));
        $livre11->setNbPages(531);
        $manager->persist($livre11);

        $livre12 = new Livre();
        $livre12->setTitre('The Outsider');
        $livre12->setAuteurId($auteur9);
        $livre12->setDateParution((new \DateTime())->setDate(2018, 05, 22));
        $livre12->setNbPages(561);
        $manager->persist($livre12);

        $livre13 = new Livre();
        $livre13->setTitre('If It Bleeds');
        $livre13->setAuteurId($auteur9);
        $livre13->setDateParution((new \DateTime())->setDate(2020, 04, 21));
        $livre13->setNbPages(448);
        $manager->persist($livre13);

        $livre14 = new Livre();
        $livre14->setTitre('The Stand');
        $livre14->setAuteurId($auteur10);
        $livre14->setDateParution((new \DateTime())->setDate(1978, 10, 10));
        $livre14->setNbPages(823);
        $manager->persist($livre14);

        $livre15 = new Livre();
        $livre15->setTitre('Pet Sematary');
        $livre15->setAuteurId($auteur10);
        $livre15->setDateParution((new \DateTime())->setDate(1983, 10, 14));
        $livre15->setNbPages(374);
        $manager->persist($livre15);

        $manager->flush();
    }
}
