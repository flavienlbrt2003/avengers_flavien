<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Faune;
use App\Entity\Flore;

class CaillouxFix extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faune1 = new Faune();
        $faune1->setImage("https://www.shutterstock.com/image-photo/baby-arctic-fox-vulpes-lagopus-600nw-2233169473.jpg");
        $faune1->setCommentaire("Félin vivant dans des zone enneigé");
        $manager->persist($faune1);

        $faune2 = new Faune();
        $faune2->setImage("https://static-images.lpnt.fr/cd-cw809/images/2019/04/29/18633880lpw-18633909-article-zoo-beauval-animal-jpg_6166393_660x287.jpg");
        $faune2->setCommentaire("Panda qui pose pour les caméras");
        $manager->persist($faune2);

        $faune3 = new Faune();
        $faune3->setImage("https://thumbs.dreamstime.com/b/verticale-de-tigre-horizontale-11392212.jpg");
        $faune3->setCommentaire("Tigre posey");
        $manager->persist($faune3);

        $flore1 = new Flore();
        $flore1->setImage("https://cdn.futura-sciences.com/sources/images/diaporama/1007-fleurs/050214-screen-fleur8-1610-diapo.jpg");
        $flore1->setCommentaire("Fleur bleu du Népal (peut-être)");
        $manager->persist($flore1);

        $flore2 = new Flore();
        $flore2->setImage("https://www.florajet.com/design/v32/blog/53.jpg");
        $flore2->setCommentaire("Belle fleur de lotus");
        $manager->persist($flore2);

        $manager->flush();
    }
}
