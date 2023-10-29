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

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/kurse/erstellen', name: 'kurs_erstellen')]
    public function create(Request $request): Response
    {
        $kurs = new Kurse();

        $form = $this->createForm(KursFormType::class, $kurs);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
        //dd($einzelner_kurs);

        return $this->render('kurse/show.html.twig', [
            'kurs' => $einzelner_kurs,
        ]);
    }
    
    #[Route('/kurse', methods:['GET'], name: 'app_kurse')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $kurs = $entityManager->getRepository(Kurse::class)->findall();

        return $this->render('kurse/index.html.twig', [
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

    #[Route('/kurse/loeschen/{id}', methods:['Get', 'DELETE'], name: 'kurse_delete')]
    public function delete(EntityManagerInterface $entityManager, $id, Request $request): Response
    {
        $kurs = $entityManager->getRepository(Kurse::class)->find($id);
        $entityManager->remove($kurs);
        $entityManager->flush();

        

        return $this->redirectToRoute('app_kurse');
    }

}
