<?php

namespace App\Controller;

use App\Entity\Kurse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailsController extends AbstractController
{
    #[Route('/', name: 'app_details')]
    public function index(): Response
    {

        $kurs = $entityManager->getRepository(Kurse::class)->findall();

        return $this->render('kurse/index.html.twig', [
            'kurse' => $kurs,
        ]);

        
        return $this->render('details/index.html.twig', [
            'controller_name' => 'DetailsController',
        ]);
    }
}
