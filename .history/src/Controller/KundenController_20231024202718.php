<?php

namespace App\Controller;

use App\Entity\Kunden;
use Doctrine\ORM\EntityManagerInterface;
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
        //dd($einzelner_kundeninfo);

        return $this->render('kunden/show.html.twig', [
            'kunde' => $einzelner_kundeninfo,
        ]);
    }

    #[Route('/kunden/bearbeiten/{id}', name: 'kunden_edit')]
    public function edit(EntityManagerInterface $entityManager, $id, Request $request): Response {
        $kurs = $entityManager->getRepository(Kurse::class)->find($id);
        $form = $this->createForm(KursFormType::class, $kurs);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kurs = $form->getData();

            $entityManager->persist($kurs);
            $entityManager->flush();

            return $this->redirectToRoute('app_kurse');
        } else {
            return $this->render('kurse/edit.html.twig', [
                'kurs' => $kurs,
                'form' => $form->createView()
            ]);
        }

        return $this->render('kurse/edit.html.twig', [
            'kurs' => $kurs,
            'form' => $form->createView()
        ]);
    }
}
