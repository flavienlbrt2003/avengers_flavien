<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\MarquePage;
use App\Entity\MotCles;
use App\Form\Type\MarquePType;
use App\Form\Type\MotClesType;

#[Route(path: "/{_locale}/marque", requirements: ["_locale" => "en|es|fr"], name: "marque_")]
class MarquePageController extends AbstractController
{
    #[Route('/')]
    public function afficherTable(EntityManagerInterface $entityManager, Request $request): Response {
        $marquesP = $entityManager->getRepository(MarquePage::class)->findAll();
        $locale = $request->getLocale();
        return $this->render('marqueP/tableau.html.twig', [
            'marquesP' => $marquesP,
            '_locale' => $locale,
        ]);
    }

    #[Route('/detail/{id}', name: 'detailMarqueP')]
    public function detail(EntityManagerInterface $entityManager, int $id, Request $request): Response {
        $marquePage = $entityManager->getRepository(MarquePage::class)->find($id);
        $locale = $request->getLocale();
        if (!$marquePage) {
            throw $this->createNotFoundException("Le marque-page demandé n'existe pas");
        }

        return $this->render('marqueP/detail.html.twig', [
            'marquePage' => $marquePage,
            '_locale' => $locale,
        ]);
    }

    #[Route('/ajout', name: 'ajouterMarqueP')]
    public function MarquePAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $marqueP = new MarquePage();
        $form = $this->createForm(MarquePType::class, $marqueP);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($marqueP);
            $entityManager->flush();
            return $this->redirectToRoute('marque_succes');
        }
        return $this->render('marqueP/marquePAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

        // Bouton "Modifier" lorsque la table affiche des marques pages
        #[Route('/modifMP/{id}', name: 'modifMP')]
        public function MarquePModif($id, Request $request, EntityManagerInterface $entityManager): Response {
            $marqueP = $entityManager->getRepository(MarquePage::class)->find($id);
            $form = $this->createForm(MarquePType::class, $marqueP);
            $form->handleRequest($request);
            $locale = $request->getLocale();
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($marqueP);
                $entityManager->flush();
                return $this->redirectToRoute('marque_succes');
            }
            return $this->render('marqueP/marquePAjout.html.twig', [
                'form' => $form,
                '_locale' => $locale,
            ]);
        }

    #[Route('/marqueP_succes', name: 'succes')]
    public function MarquePSucces(EntityManagerInterface $entityManager, Request $request): Response {
        $locale = $request->getLocale();
        return $this->render('marqueP/marqueP_succes.html.twig', [
            '_locale' => $locale,
        ]);
    }


    // Mots Clés
    #[Route('/motcle')]
    public function afficherMotsCles(EntityManagerInterface $entityManager, Request $request): Response {
        $motscles = $entityManager->getRepository(MotCles::class)->findAll();
        $locale = $request->getLocale();
        return $this->render('motsCles/index.html.twig', [
            'motscles' => $motscles,
            '_locale' => $locale,
        ]);
    }

    #[Route('/motcleAjout', name: 'ajouterMotCle')]
    public function MotCleAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $motcle = new MotCles();
        $form = $this->createForm(MotClesType::class, $motcle);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motcle);
            $entityManager->flush();
            return $this->redirectToRoute('marque_motclesucces');
        }
        return $this->render('motsCles/motcleAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    // Bouton "Modifier" lorsque la table affiche des marques pages
    #[Route('/modifMC/{id}', name: 'modifMC')]
    public function MotCleModif($id, Request $request, EntityManagerInterface $entityManager): Response {
        $motC = $entityManager->getRepository(MotCles::class)->find($id);
        $form = $this->createForm(MotClesType::class, $motC);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motC);
            $entityManager->flush();
            return $this->redirectToRoute('marque_motclesucces');
        }
        return $this->render('motsCles/motcleAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    #[Route('/motcle_succes', name: 'motclesucces')]
    public function MotCleSucces(EntityManagerInterface $entityManager, Request $request): Response {
        $locale = $request->getLocale();
        return $this->render('motsCles/motcle_succes.html.twig', [
            '_locale' => $locale,
        ]);
    }
}

?>