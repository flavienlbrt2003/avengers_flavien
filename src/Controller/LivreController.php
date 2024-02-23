<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Livre;
use App\Entity\Auteur;

class LivreController extends AbstractController
{

    #[Route('/livre')]
    public function afficherTable(EntityManagerInterface $entityManager): Response {
        $livre = $entityManager->getRepository(Livre::class)->findAll();
        return $this->render('livre/index.html.twig', [
            'livres' => $livre,
        ]);
    }

    #[Route('/livre/detail/{id}', name: 'detailLivre')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response {
        $livre = $entityManager->getRepository(Livre::class)->find($id);

        if (!$livre) {
            throw $this->createNotFoundException("Le livre demandé n'existe pas");
        }

        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
        ]);
    }
}
