<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Faune;
use App\Entity\Flore;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/cailloux", requirements: ["_locale" => "en|es|fr"], name: "cailloux_")]
class CaillouxController extends AbstractController
{
    #[Route('/faune', name: 'Faune')]
    public function afficherTableFaune(EntityManagerInterface $entityManager): Response {
        $faune = $entityManager->getRepository(Faune::class)->findAll();
        return $this->render('cailloux/faune.html.twig', [
            'faunes' => $faune,
        ]);
    }

    #[Route('/flore', name: 'Flore')]
    public function afficherTableFlore(EntityManagerInterface $entityManager): Response {
        $flore = $entityManager->getRepository(Flore::class)->findAll();
        return $this->render('cailloux/flore.html.twig', [
            'flore' => $flore,
        ]);
    }
}
