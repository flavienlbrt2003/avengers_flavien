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

#[Route("/marque", requirements: ["_locale" => "en|es|fr"], name: "marque_")]
class MarquePageController extends AbstractController
{
    #[Route('/')]
    public function afficherTable(EntityManagerInterface $entityManager): Response {
        $marquesP = $entityManager->getRepository(MarquePage::class)->findAll();
        return $this->render('marqueP/tableau.html.twig', [
            'marquesP' => $marquesP,
        ]);
    }

    #[Route('/detail/{id}', name: 'detailMarqueP')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response {
        $marquePage = $entityManager->getRepository(MarquePage::class)->find($id);

        if (!$marquePage) {
            throw $this->createNotFoundException("Le marque-page demandé n'existe pas");
        }

        return $this->render('marqueP/detail.html.twig', [
            'marquePage' => $marquePage,
        ]);
    }

    #[Route('/ajout', name: 'ajouterMarqueP')]
    public function MarquePAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $marqueP = new MarquePage();
        $form = $this->createForm(MarquePType::class, $marqueP);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($marqueP);
            $entityManager->flush();
            return $this->redirectToRoute('marque_succes');
        }
        return $this->render('marqueP/marquePAjout.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/marqueP_succes', name: 'succes')]
    public function MarquePSucces(EntityManagerInterface $entityManager): Response {
        return $this->render('marqueP/marqueP_succes.html.twig');
    }


    // Mots Clés
    #[Route('/motcle')]
    public function afficherMotsCles(EntityManagerInterface $entityManager): Response {
        $motscles = $entityManager->getRepository(MotCles::class)->findAll();
        return $this->render('motsCles/index.html.twig', [
            'motscles' => $motscles,
        ]);
    }

    #[Route('/motcleAjout', name: 'ajouterMotCle')]
    public function MotCleAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $motcle = new MotCles();
        $form = $this->createForm(MotClesType::class, $motcle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motcle);
            $entityManager->flush();
            return $this->redirectToRoute('marque_motclesucces');
        }
        return $this->render('motsCles/motcleAjout.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/motcle_succes', name: 'motclesucces')]
    public function MotCleSucces(EntityManagerInterface $entityManager): Response {
        return $this->render('motsCles/motcle_succes.html.twig');
    }
}

?>