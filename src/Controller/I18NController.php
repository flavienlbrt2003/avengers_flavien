<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class I18NController extends AbstractController
{
    #[Route('/i18n/', name: 'app_i18_n')]
    public function index(TranslatorInterface $translator): Response
    {
        echo $translator->trans('dit.bonjour', ['prenom' => 'Toi']);
        echo $translator->trans('dit.bonjour', ['prenom' => 'Symfony']);
        return $this->render('i18n/index.html.twig', [
            'controller_name' => 'I18NController',
            'trad' => $translator->trans('texte.traduire')
        ]);
    }
}
