<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Employe;
use App\Entity\Adresse;
use App\Form\Type\EmployeType;

#[Route("/employe", requirements: ["_locale" => "en|es|fr"], name: "employe_")]
class EmployeController extends AbstractController
{
    #[Route('/')]
    public function afficherTable(EntityManagerInterface $entityManager): Response {
        $employes = $entityManager->getRepository(Employe::class)->findAll();
        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
        ]);
    }

    #[Route('/ajout', name: 'ajouterEmploye')]
    public function EmployeAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employe);
            $entityManager->flush();
            return $this->redirectToRoute('employe_succes');
        }
        return $this->render('employe/employeAjout.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/employe_succes', name: 'succes')]
    public function EmployeSucces(EntityManagerInterface $entityManager): Response {
        return $this->render('employe/employe_succes.html.twig');
    }

}

?>