<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\MarquePage;
use App\Entity\MotCles;


class MarqueP extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Faire un tableau / liste pour y stocker tout les mot clés à chaque fois qu'on en créer
        $listeMotCles = [];
        for ($i = 0; $i < 25; $i++) {
            $motCle = new MotCles();
            $motCle->setLibelle('MotClé '.$i);
            $manager->persist($motCle);
            array_push($listeMotCles, $motCle);
        }

        for ($i = 0; $i < 15; $i++) {
            $marqueP = new MarquePage();
            $marqueP->setUrl('https://exemple.url/'.$i);
            $marqueP->setDateCreation((new \DateTime())->setDate(mt_rand(1995, 2023), mt_rand(1, 12), mt_rand(1, 29)));
            $marqueP->setCommentaire("test");
            $nbMotCles = mt_rand(2, 5);
            for($j = 0; $j < $nbMotCles; $j++){
                $motC = mt_rand(0, count($listeMotCles)-1);
                $marqueP->addMotCle($listeMotCles[$motC]);
            }
            $manager->persist($marqueP);
        } 
        $manager->flush();
    }
}
