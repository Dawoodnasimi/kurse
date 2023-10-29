<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class KundenController extends AbstractController {

    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/kunden', name: 'app_kunden')]
    public function index(): Response {
        return $this->render('kunden/index.html.twig', [
            'controller_name' => 'KundenController',
        ]);
    }

    #[Route('/kunden/show', name: 'kunden_erstellen')]
    public function create(): Response {
        return $this->render('kunden/create.html.twig', [
            'controller_name' => 'KundenController',
        ]);
    }
}
