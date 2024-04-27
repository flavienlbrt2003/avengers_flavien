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

#[Route(path: "/{_locale}/employe", requirements: ["_locale" => "en|es|fr"], name: "employe_")]
class EmployeController extends AbstractController
{
    #[Route('/')]
    public function afficherTable(EntityManagerInterface $entityManager, Request $request): Response {
        $employes = $entityManager->getRepository(Employe::class)->findAll();
        $locale = $request->getLocale();
        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
            '_locale' => $locale,
        ]);
    }

    #[Route('/ajout', name: 'ajouterEmploye')]
    public function EmployeAjout(Request $request, EntityManagerInterface $entityManager): Response {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);
        $locale = $request->getLocale();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employe);
            $entityManager->flush();
            return $this->redirectToRoute('employe_succes');
        }
        return $this->render('employe/employeAjout.html.twig', [
            'form' => $form,
            '_locale' => $locale,
        ]);
    }

    #[Route('/employe_succes', name: 'succes')]
    public function EmployeSucces(EntityManagerInterface $entityManager, Request $request): Response {
        $locale = $request->getLocale();
        return $this->render('employe/employe_succes.html.twig', [
            '_locale' => $locale,
        ]);
    }

}

?>