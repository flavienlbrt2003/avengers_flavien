<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Faune;
use App\Entity\Flore;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route(path: "/{_locale}/cailloux", requirements: ["_locale" => "en|es|fr"], name: "cailloux_")]
class CaillouxController extends AbstractController
{
    #[Route('/faune', name: 'Faune')]
    public function afficherTableFaune(EntityManagerInterface $entityManager, Request $request): Response {
        $faune = $entityManager->getRepository(Faune::class)->findAll();
        $locale = $request->getLocale();
        return $this->render('cailloux/faune.html.twig', [
            'faunes' => $faune,
            '_locale' => $locale,
        ]);
    }

    #[Route('/flore', name: 'Flore')]
    public function afficherTableFlore(EntityManagerInterface $entityManager, Request $request): Response {
        $flore = $entityManager->getRepository(Flore::class)->findAll();
        $locale = $request->getLocale();
        return $this->render('cailloux/flore.html.twig', [
            'flore' => $flore,
            '_locale' => $locale,
        ]);
    }
}
