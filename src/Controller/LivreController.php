<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Livre;
use App\Form\Type\LivreType;
use App\Entity\Auteur;
use App\Form\Type\AuteurType;

#[Route("/livre", requirements: ["_locale" => "en|es|fr"], name: "livre_")]
class LivreController extends AbstractController
{

    #[Route("/", name: "index")]
    public function afficherTable(EntityManagerInterface $entityManager): Response {
        $livre = $entityManager->getRepository(Livre::class)->findAll();
        $nbLivre = $entityManager->getRepository(Livre::class)->NbLivres();
        return $this->render('livre/index.html.twig', [
            'livres' => $livre,
            'nbLivre' => $nbLivre,
        ]);
    }

    // Bouton "détail"
    #[Route('/detail/{id}', name: 'detailLivre')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response {
        $livre = $entityManager->getRepository(Livre::class)->find($id);

        if (!$livre) {
            throw $this->createNotFoundException("Le livre demandé n'existe pas");
        }

        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
        ]);
    }

    // Accessible uniquement par l'url
    #[Route('/lettre/{lettre}', name: 'LivreLettre')]
    public function AfficherLivresPremiereLettre($lettre, EntityManagerInterface $entityManager){
        $listeLivres = $entityManager->getRepository(Livre::class)->LivresPremiereLettre($lettre);
        return $this->render('livre/premiereL.html.twig', [
            'listeLivre' => $listeLivres,
            'lettre' => $lettre,
        ]);
    }

    // Accessible uniquement par l'url
    #[Route('/listeAuteur/{nbLivre}', name: 'nbLivreAuteur')]
    public function AfficherNbLivresAuteur($nbLivre, EntityManagerInterface $entityManager){
        $listeAuteur = $entityManager->getRepository(Livre::class)->NbLivresAuteur($nbLivre);
        return $this->render('livre/listeAuteur.html.twig', [
            'listeAuteur' => $listeAuteur,
            'nbLivre' => $nbLivre,
        ]);
    }

    // Bouton "Ajouter livre"
    #[Route('/ajout', name: 'ajouterLivre')]
    public function LivreAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('livre_Succes');
        }
        return $this->render('livre/livreAjout.html.twig', [
            'form' => $form,
        ]);
    }

    // Bouton "Modifier" lorsque la table affiche des livres
    #[Route('/modif/{id}', name: 'modif')]
    public function LivreModif($id, Request $request, EntityManagerInterface $entityManager): Response {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('livre_Succes');
        }
        return $this->render('livre/livreAjout.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/livre_succes', name: 'Succes')]
    public function LivreSucces(EntityManagerInterface $entityManager): Response {
        return $this->render('livre/livre_succes.html.twig');
    }
}
