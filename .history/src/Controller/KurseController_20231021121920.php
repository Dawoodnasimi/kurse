<?php

namespace App\Controller;

use App\Entity\Kurse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class KurseController extends AbstractController
{

    /* private $kurs;
    public function __construct(Kurse $kurs)
    {
        $this->kurs = $kurs;
    } */



    #[Route('/kurse/', methods:['GET'], name: 'app_kurse')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $kurs = $entityManager->getRepository(Kurse::class)->findall();
        //$kurse = $this->kurs->findAll();

        return $this->render('kurse/index.html.twig', [
            //'controller_name' => 'KurseController',
            'kurse' => $kurs,
        ]);
    }

    public function create(EntityManagerInterface $entityManager): Response
    {
        $kurs = new Kurse();
        $kurs->setName('Kurs 1');
        $kurs->setDauer(6);
        $kurs->setInfo('Kurs 1 Info');

        $entityManager->persist($kurs);
        $entityManager->flush();

        return new Response('Kurs wurde erstellt mit der ID: ' . $kurs->getId());
    }
}
