<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class KundenController extends AbstractController {

    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

        #[Route('/kunden', methods:['GET'], name: 'app_kurse')]
        public function index(EntityManagerInterface $entityManager): Response
        {

        $kunde = $entityManager->getRepository(Kunden::class)->findAll();

            return $this->render('kunden/index.html.twig', [
                'kunden' => $kunde,
            ]);
        }
    }

}
