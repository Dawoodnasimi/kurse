<?php

namespace App\Controller;

use App\Entity\Kurse;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailsController extends AbstractController
{
    #[Route('/', name: 'app_details')]
    public function index(EntityManager $entityManager): Response
    {

        $kurs = $entityManager->getRepository(Kurse::class)->findall();
        $kunden = $entityManager->getRepository(Kunden::class)->findall();

        return $this->render('kurse/index.html.twig', [
            'kurse' => $kurs,
        ]);

    }
}
