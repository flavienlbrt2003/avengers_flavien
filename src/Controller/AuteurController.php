<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Auteur;
use App\Entity\Livre;
use App\Form\Type\AuteurType;

#[Route("/auteur", requirements: ["_locale" => "en|es|fr"], name: "auteur_")]
class AuteurController extends AbstractController
{

    #[Route("/", name: "index")]
    public function afficherTable(EntityManagerInterface $entityManager): Response {
        $auteurs = $entityManager->getRepository(Auteur::class)->findAll();
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    // Route non demandé, voir READMDE.md
    // Bouton "Liste" lorsque la table affiche des auteurs
    #[Route('/liste/{auteurId}', name: 'LivreAuteur')]
    public function AfficherLivresAuteur($auteurId, EntityManagerInterface $entityManager){
        $listeLivres = $entityManager->getRepository(Livre::class)->LivresAuteur($auteurId);
        return $this->render('auteur/livresAuteur.html.twig', [
            'listeLivre' => $listeLivres,
            'auteurId' => $auteurId,
        ]);
    }

    // Bouton "Ajouter auteur"
    #[Route('/ajout', name: 'ajout')]
    public function AuteurAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('auteur_Succes');
        }
        return $this->render('auteur/auteurAjout.html.twig', [
            'form' => $form,
        ]);
    }

    // Bouton "Modifier" lorsque la table affiche des auteurs
    #[Route('/modif/{id}', name: 'modif')]
    public function AuteurModif($id, Request $request, EntityManagerInterface $entityManager): Response {
        $auteur = $entityManager->getRepository(Auteur::class)->find($id);
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('auteur_Succes');
        }
        return $this->render('auteur/auteurAjout.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/auteur_succes', name: 'Succes')]
    public function AuteurSucces(EntityManagerInterface $entityManager): Response {
        return $this->render('auteur/auteur_succes.html.twig');
    }
}
