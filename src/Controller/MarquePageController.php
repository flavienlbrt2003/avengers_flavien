<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\MarquePage;
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
        $marqueP = new MarquePage();
        $marqueP->setUrl("https://chat.openai.com");
        $marqueP->setDateCreation(new \DateTime());
        $marqueP->setcommentaire("IA au top niveau");
        $entityManager->persist($marqueP);
        $entityManager->flush();
        return new Response("Url sauvegardé avec l'id ".$marqueP->getId());
    }

}

?>