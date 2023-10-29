<?php

namespace App\Controller;

use App\Entity\kundee;
use App\Entity\Kunden;
use App\Form\kundeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class KundenController extends AbstractController {

    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/kunden', methods: ['GET'], name: 'app_kunden')]
    public function index(EntityManagerInterface $entityManager): Response {

        $kunde = $entityManager->getRepository(Kunden::class)->findAll();

        return $this->render('kunden/index.html.twig', [
            'kunden' => $kunde,
        ]);
    }

    #[Route('/kunden/{id}', methods: ['GET'], name: 'kunden')]
    public function show(EntityManagerInterface $entityManager, $id): Response {
        $einzelner_kundeninfo = $entityManager->getRepository(Kunden::class)->find($id);
        dd($einzelner_kundeninfo);
        exit;

        return $this->render('kunden/show.html.twig', [
            'kunde' => $einzelner_kundeninfo,
        ]);
    }

    /* #[Route('/kunden/bearbeiten/{id}', name: 'kunden_edit')]
    public function edit(EntityManagerInterface $entityManager, $id, Request $request): Response {
        $kunde = $entityManager->getRepository(Kunden::class)->find($id);
        $form = $this->createForm(KundenFormType::class, $kunde);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kunde = $form->getData();

            $entityManager->persist($kunde);
            $entityManager->flush();

            return $this->redirectToRoute('app_kundee');
        } else {
            return $this->render('kunde/edit.html.twig', [
                'kunde' => $kunde,
                'form' => $form->createView()
            ]);
        }

        return $this->render('kunde/edit.html.twig', [
            'kunde' => $kunde,
            'form' => $form->createView()
        ]);
    } */

    #[Route('/kunden/erstellen', name: 'kunden_erstellen')]
    public function create(Request $request): Response {
        $kunde = new Kunden();

        $form = $this->createForm(KundenFormType::class, $kunde);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $neuer_kunde = $form->getData();

            dd($neuer_kunde);
            exit;

            $this->em->persist($neuer_kunde);
            $this->em->flush();

            return $this->redirectToRoute('app_kunden');
        }

        return $this->render('kunden/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
