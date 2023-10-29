<?php

namespace App\Controller;

use App\Entity\Kurse;
use App\Form\KursFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;

class KurseController extends AbstractController
{

    /* private $kurs;
    public function __construct(Kurse $kurs)
    {
        $this->kurs = $kurs;
    } */

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    #[Route('/kurse/erstellen', name: 'kurs_erstellen')]
    public function create(Request $request): Response
    {
        $kurs = new Kurse();
        //create a form view and send it to the template

        $form = $this->createForm(KursFormType::class, $kurs);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($kurs);
           $neuer_kurs = $form->getData();

           //dd($neuer_kurs);
           //exit;

            $this->em->persist($neuer_kurs);
            $this->em->flush();

            return $this->redirectToRoute('app_kurse');
        }

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

    #[Route('/kurse/bearbeiten/{id}', name: 'kurse_edit')]
    public function edit(EntityManagerInterface $entityManager, $id, Request $request): Response
    {
        $kurs = $entityManager->getRepository(Kurse::class)->find($id);
        $form = $this->createForm(KursFormType::class, $kurs);

        $form->handleRequest($request);

        if ($form -> isSubmitted() && $form->isValid()) {
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
