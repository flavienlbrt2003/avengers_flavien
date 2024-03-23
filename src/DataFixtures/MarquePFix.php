<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\MarquePage;
use App\Entity\MotCles;


class MarquePFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Faire un tableau / liste pour y stocker tout les mot clés à chaque fois qu'on en créer
        $listeMotCles = [];

        // Boucle pour créer des mot clés (V1)
        /* for ($i = 0; $i < 25; $i++) {
            $motCle = new MotCles();
            $motCle->setLibelle('MotClé '.$i);
            $manager->persist($motCle);
            array_push($listeMotCles, $motCle);
        } */

        // Création de 15 mots clés en dure pour avoir des meilleurs données pour les tests. (V2)

        $motCle1 = new MotCles();
        $motCle1->setLibelle('Communication');
        $manager->persist($motCle1);
        array_push($listeMotCles, $motCle1);

        $motCle2 = new MotCles();
        $motCle2->setLibelle('Recherhe');
        $manager->persist($motCle2);
        array_push($listeMotCles, $motCle2);

        $motCle3 = new MotCles();
        $motCle3->setLibelle('Forum');
        $manager->persist($motCle3);
        array_push($listeMotCles, $motCle3);

        $motCle4 = new MotCles();
        $motCle4->setLibelle('IA');
        $manager->persist($motCle4);
        array_push($listeMotCles, $motCle4);

        $motCle5 = new MotCles();
        $motCle5->setLibelle('Développement');
        $manager->persist($motCle5);
        array_push($listeMotCles, $motCle5);

        $motCle6 = new MotCles();
        $motCle6->setLibelle('Vidéos');
        $manager->persist($motCle6);
        array_push($listeMotCles, $motCle6);

        $motCle7 = new MotCles();
        $motCle7->setLibelle('Streaming');
        $manager->persist($motCle7);
        array_push($listeMotCles, $motCle7);

        $motCle8 = new MotCles();
        $motCle8->setLibelle('Gestion');
        $manager->persist($motCle8);
        array_push($listeMotCles, $motCle8);

        $motCle9 = new MotCles();
        $motCle9->setLibelle('Enseignement');
        $manager->persist($motCle9);
        array_push($listeMotCles, $motCle9);

        $motCle10 = new MotCles();
        $motCle10->setLibelle('Sites web');
        $manager->persist($motCle10);
        array_push($listeMotCles, $motCle10);

        $motCle11 = new MotCles();
        $motCle11->setLibelle('Applications');
        $manager->persist($motCle11);
        array_push($listeMotCles, $motCle11);

        $motCle12 = new MotCles();
        $motCle12->setLibelle('Front-end');
        $manager->persist($motCle12);
        array_push($listeMotCles, $motCle12);

        $motCle13 = new MotCles();
        $motCle13->setLibelle('Nouvelle-Calédonie');
        $manager->persist($motCle13);
        array_push($listeMotCles, $motCle13);

        $motCle14 = new MotCles();
        $motCle14->setLibelle('Technologie');
        $manager->persist($motCle14);
        array_push($listeMotCles, $motCle14);

        $motCle15 = new MotCles();
        $motCle15->setLibelle('Cadre de développement');
        $manager->persist($motCle15);
        array_push($listeMotCles, $motCle15);
        

        // Boucle pour créer des marques pages (V1)
        /* for ($i = 0; $i < 15; $i++) {
            $marqueP = new MarquePage();
            $marqueP->setUrl('https://exemple.url/'.$i);
            $marqueP->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
            $marqueP->setCommentaire("Marque page ".$i);
            $nbMotCles = mt_rand(2, 5);
            for($j = 0; $j < $nbMotCles; $j++){
                $motC = mt_rand(0, count($listeMotCles)-1);
                $marqueP->addMotCle($listeMotCles[$motC]);
            }
            $manager->persist($marqueP);
        } */ 


        // Création de 10 marques pages en dure pour avoir des meilleurs données pour les tests. (V2)

        $marqueP1 = new MarquePage();
        $marqueP1->setUrl('https://chat.openai.com');
        $marqueP1->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP1->setCommentaire("Plateforme de communication développée par OpenAI.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP1->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP1);

        $marqueP2 = new MarquePage();
        $marqueP2->setUrl('https://www.google.com');
        $marqueP2->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP2->setCommentaire("Moteur de recherche le plus utilisé au monde.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP2->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP2);

        $marqueP3 = new MarquePage();
        $marqueP3->setUrl('https://github.com');
        $marqueP3->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP3->setCommentaire("Plateforme de développement collaboratif pour les projets de logiciels.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP3->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP3);

        $marqueP4 = new MarquePage();
        $marqueP4->setUrl('https://www.youtube.com');
        $marqueP4->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP4->setCommentaire("Site web de partage de vidéos.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP4->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP4);

        $marqueP5 = new MarquePage();
        $marqueP5->setUrl('https://www.netflix.com');
        $marqueP5->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP5->setCommentaire("Service de streaming pour les films et les séries télévisées.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP5->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP5);

        $marqueP6 = new MarquePage();
        $marqueP6->setUrl('https://www.disneyplus.com');
        $marqueP6->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP6->setCommentaire("Plateforme de streaming proposant du contenu Disney.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP6->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP6);

        $marqueP7 = new MarquePage();
        $marqueP7->setUrl('https://applis.univ-nc.nc/cgi-bin/WebObjects/EdtWeb.woa');
        $marqueP7->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP7->setCommentaire("Application de gestion d'emploi du temps pour l'Université de la Nouvelle-Calédonie.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP7->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP7);

        $marqueP8 = new MarquePage();
        $marqueP8->setUrl('https://iut.unc.nc');
        $marqueP8->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP8->setCommentaire("Site web de l'Institut Universitaire de Technologie de Nouvelle-Calédonie.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP8->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP8);

        $marqueP9 = new MarquePage();
        $marqueP9->setUrl('https://unc.nc');
        $marqueP9->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP9->setCommentaire("Site web de l'Université de la Nouvelle-Calédonie.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP9->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP9);

        $marqueP10 = new MarquePage();
        $marqueP10->setUrl('https://getbootstrap.com');
        $marqueP10->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
        $marqueP10->setCommentaire("Cadre de développement front-end pour la création de sites web et d'applications.");
        $nbMotCles = mt_rand(2, 5);
        for($j = 0; $j < $nbMotCles; $j++){
            $motC = mt_rand(0, count($listeMotCles)-1);
            $marqueP10->addMotCle($listeMotCles[$motC]);
        }
        $manager->persist($marqueP10);


        $manager->flush();
    }
}
