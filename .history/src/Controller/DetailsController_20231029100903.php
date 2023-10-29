<?php

namespace App\Controller;

use App\Entity\Kurse;
use App\Entity\Kunden;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailsController extends AbstractController
{
    #[Route('/', name: 'app_details')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $kurs = $entityManager->getRepository(Kurse::class)->findall();
        $kunden = $entityManager->getRepository(Kunden::class)->findall();

        return $this->render('/index.html.twig', [
            'kurse' => $kurs,
            'kunden' => $kunden
        ]);

    }
}
