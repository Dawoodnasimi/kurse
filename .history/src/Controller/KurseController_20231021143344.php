<?php

namespace App\Controller;

use App\Entity\Kurse;
use App\Form\KursFormType;
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


    #[Route('/kurse/erstellen', name: 'kurs_erstellen')]
    public function create(): Response
    {
        $kurs = new Kurse();
        $form->$this->createForm(KursFormType::class, $kurs);

        return $this->render('kurse/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/kurse/{id}', methods:['GET'], name: 'kurse')]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $einzelner_kurs = $entityManager->getRepository(Kurse::class)->find($id);
        //$kurse = $this->kurs->findAll();

        //dd($einzelner_kurs);

        return $this->render('kurse/show.html.twig', [
            //'controller_name' => 'KurseController',
            'kurs' => $einzelner_kurs,
        ]);
    }

    //#[Route('/kurse/{id}/edit', methods:['GET', 'POST'], name: 'kurse_edit')]
    


    #[Route('/kurse', methods:['GET'], name: 'app_kurse')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $kurs = $entityManager->getRepository(Kurse::class)->findall();
        //$kurse = $this->kurs->findAll();

        return $this->render('kurse/index.html.twig', [
            //'controller_name' => 'KurseController',
            'kurse' => $kurs,
        ]);
    }

    /* public function create(EntityManagerInterface $entityManager): Response
    {
        $kurs = new Kurse();
        $kurs->setName('Kurs 1');
        $kurs->setDauer(6);
        $kurs->setInfo('Kurs 1 Info');

        $entityManager->persist($kurs);
        $entityManager->flush();

        return new Response('Kurs wurde erstellt mit der ID: ' . $kurs->getId());
    } */
}
