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

#[Route(path: "/{_locale}/livre", requirements: ["_locale" => "en|es|fr"], name: "livre_")]
class LivreController extends AbstractController
{

    #[Route("/", name: "index")]
    public function afficherTable(EntityManagerInterface $entityManager, Request $request): Response {
        $livre = $entityManager->getRepository(Livre::class)->findAll();
        $locale = $request->getLocale();
        $nbLivre = $entityManager->getRepository(Livre::class)->NbLivres();
        return $this->render('livre/index.html.twig', [
            'livres' => $livre,
            'nbLivre' => $nbLivre,
            '_locale' => $locale,
        ]);
    }

    // Bouton "détail"
    #[Route('/detail/{id}', name: 'detailLivre')]
    public function detail(EntityManagerInterface $entityManager, int $id, Request $request): Response {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        $locale = $request->getLocale();
        if (!$livre) {
            throw $this->createNotFoundException("Le livre demandé n'existe pas");
        }

        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
            '_locale' => $locale,
        ]);
    }

    // Accessible uniquement par l'url
    #[Route('/lettre/{lettre}', name: 'LivreLettre')]
    public function AfficherLivresPremiereLettre($lettre, EntityManagerInterface $entityManager, Request $request){
        $listeLivres = $entityManager->getRepository(Livre::class)->LivresPremiereLettre($lettre);
        $locale = $request->getLocale();
        return $this->render('livre/premiereL.html.twig', [
            'listeLivre' => $listeLivres,
            'lettre' => $lettre,
            '_locale' => $locale,
        ]);
    }

    // Accessible uniquement par l'url
    #[Route('/listeAuteur/{nbLivre}', name: 'nbLivreAuteur')]
    public function AfficherNbLivresAuteur($nbLivre, EntityManagerInterface $entityManager, Request $request){
        $listeAuteur = $entityManager->getRepository(Livre::class)->NbLivresAuteur($nbLivre);
        $locale = $request->getLocale();
        return $this->render('livre/listeAuteur.html.twig', [
            'listeAuteur' => $listeAuteur,
            'nbLivre' => $nbLivre,
            '_locale' => $locale,
        ]);
    }

    // Bouton "Ajouter livre"
    #[Route('/ajout', name: 'ajouterLivre')]
    public function LivreAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('livre_Succes');
        }
        return $this->render('livre/livreAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    // Bouton "Modifier" lorsque la table affiche des livres
    #[Route('/modif/{id}', name: 'modif')]
    public function LivreModif($id, Request $request, EntityManagerInterface $entityManager): Response {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->redirectToRoute('livre_Succes');
        }
        return $this->render('livre/livreAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    #[Route('/livre_succes', name: 'Succes')]
    public function LivreSucces(EntityManagerInterface $entityManager, Request $request): Response {
        $locale = $request->getLocale();
        return $this->render('livre/livre_succes.html.twig', [
            '_locale' => $locale,
        ]);
    }
}
