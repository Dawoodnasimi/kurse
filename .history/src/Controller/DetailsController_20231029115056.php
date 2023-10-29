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

        return $this->render('details/index.html.twig', [
            'kurse' => $kurs,
            'kunden' => $kunden
        ]);

    }

/* set route of kurse/id and kunden/id inside one show function */
    #[Route('/{id}', methods: ['GET'], name: 'details')]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $einzelner_kursinfo = $entityManager->getRepository(Kurse::class)->find($id);
        $einzelner_kundeninfo = $entityManager->getRepository(Kunden::class)->find($id);

        return $this->render('details/show.html.twig', [
            'kurs' => $einzelner_kursinfo,
            'kunden' => $einzelner_kundeninfo
        ]);
    }

}
