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

#[Route(path: '/{_locale}/auteur', requirements: ["_locale" => "en|es|fr"], name: "auteur_")]
class AuteurController extends AbstractController
{

    #[Route("/", name: "index")]
    public function afficherTable(EntityManagerInterface $entityManager, Request $request): Response {
        $auteurs = $entityManager->getRepository(Auteur::class)->findAll();
        $locale = $request->getLocale();
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
            '_locale' => $locale,
        ]);
    }

    // Route non demandé, voir READMDE.md
    // Bouton "Liste" lorsque la table affiche des auteurs
    #[Route('/liste/{auteurId}', name: 'LivreAuteur')]
    public function AfficherLivresAuteur($auteurId, EntityManagerInterface $entityManager, Request $request){
        $listeLivres = $entityManager->getRepository(Livre::class)->LivresAuteur($auteurId);
        $locale = $request->getLocale();
        return $this->render('auteur/livresAuteur.html.twig', [
            'listeLivre' => $listeLivres,
            'auteurId' => $auteurId,
            '_locale' => $locale,
        ]);
    }

    // Bouton "Ajouter auteur"
    #[Route('/ajout', name: 'ajout')]
    public function AuteurAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $auteur = new Auteur();
        $locale = $request->getLocale();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('auteur_Succes');
        }
        return $this->render('auteur/auteurAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    // Bouton "Modifier" lorsque la table affiche des auteurs
    #[Route('/modif/{id}', name: 'modif')]
    public function AuteurModif($id, Request $request, EntityManagerInterface $entityManager): Response {
        $auteur = $entityManager->getRepository(Auteur::class)->find($id);
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('auteur_Succes');
        }
        return $this->render('auteur/auteurAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    #[Route('/auteur_succes', name: 'Succes')]
    public function AuteurSucces(EntityManagerInterface $entityManager, Request $request): Response {
        $locale = $request->getLocale();
        return $this->render('auteur/auteur_succes.html.twig', [
            '_locale' => $locale,
    ]);
    }
}
