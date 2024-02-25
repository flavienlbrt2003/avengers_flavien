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
        $nbLivre = $entityManager->getRepository(Livre::class)->NbLivres();
        return $this->render('livre/index.html.twig', [
            'livres' => $livre,
            'nbLivre' => $nbLivre,
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

    #[Route('/livre/lettre/{lettre}', name: 'LivreLettre')]
    public function AfficherLivresPremiereLettre($lettre, EntityManagerInterface $entityManager){
        $listeLivres = $entityManager->getRepository(Livre::class)->LivresPremiereLettre($lettre);
        return $this->render('livre/premiereL.html.twig', [
            'listeLivre' => $listeLivres,
            'lettre' => $lettre,
        ]);
    }

    // Route non demandé, voir READMDE.md
    #[Route('/livre/auteur/{auteurId}', name: 'LivreAuteur')]
    public function AfficherLivresAuteur($auteurId, EntityManagerInterface $entityManager){
        $listeLivres = $entityManager->getRepository(Livre::class)->LivresAuteur($auteurId);
        return $this->render('livre/auteur.html.twig', [
            'listeLivre' => $listeLivres,
            'auteurId' => $auteurId,
        ]);
    }

    #[Route('/livre/listeAuteur/{nbLivre}', name: 'nbLivreAuteur')]
    public function AfficherNbLivresAuteur($nbLivre, EntityManagerInterface $entityManager){
        $listeAuteur = $entityManager->getRepository(Livre::class)->NbLivresAuteur($nbLivre);
        return $this->render('livre/listeAuteur.html.twig', [
            'listeAuteur' => $listeAuteur,
            'nbLivre' => $nbLivre,
        ]);
    }
}
