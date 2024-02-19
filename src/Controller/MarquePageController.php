<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\MarquePage;
use App\Entity\MotCles;
use Doctrine\ORM\EntityManagerInterface;

class MarquePageController extends AbstractController
{
    #[Route('/marque/page')]
    public function afficherTable(EntityManagerInterface $entityManager): Response {
        $marquesP = $entityManager->getRepository(MarquePage::class)->findAll();
        return $this->render('marqueP/tableau.html.twig', [
            'marquesP' => $marquesP,
        ]);
    }

    #[Route('/marque/ajouter', name: "marqueP_ajouter")]
    public function ajouterMarque(EntityManagerInterface $entityManager): Response {
        $motCle = new MotCles();
        $motCle->setLibelle("Symfony");

        $marqueP = new MarquePage();
        $marqueP->setUrl("https://iut.unc.nc");
        $marqueP->setDateCreation(new \DateTime());
        $marqueP->setcommentaire("IUT en force");
        $marqueP->setMotCle($motCle);
        $entityManager->persist($motCle);
        $entityManager->persist($marqueP);
        $entityManager->flush();
        return new Response("Url sauvegardé avec l'id ".$marqueP->getId());
    }

    #[Route('/detail/{id}', name: 'detail')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response {
        $marquePage = $entityManager->getRepository(MarquePage::class)->find($id);

        if (!$marquePage) {
            throw $this->createNotFoundException("Le marque-page demandé n'existe pas");
        }

        return $this->render('marqueP/detail.html.twig', [
            'marquePage' => $marquePage,
        ]);
    }

}

?>