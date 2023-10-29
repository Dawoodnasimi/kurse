<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class KundenController extends AbstractController {
    #[Route('/kunden', name: 'app_kunden')]
    public function index(): Response {
        return $this->render('kunden/index.html.twig', [
            'controller_name' => 'KundenController',
        ]);
    }

    #[Route('/kunden/erstellen', name: 'kunden_erstellen')]
    public function create(): Response {
        return $this->render('kunden/create.html.twig', [
            'controller_name' => 'KundenController',
        ]);
    }
}
