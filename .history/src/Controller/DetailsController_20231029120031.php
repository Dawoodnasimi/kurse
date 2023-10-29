<?php

namespace App\Controller;

use App\Entity\Kurse;
use App\Entity\Kunden;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    /* #[Route('/{id}', methods: ['GET'], name: 'details')]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $einzelner_kursinfo = $entityManager->getRepository(Kurse::class)->find($id);
        $einzelner_kundeninfo = $entityManager->getRepository(Kunden::class)->find($id);

        return $this->render('details/show.html.twig', [
            'kurs' => $einzelner_kursinfo,
            'kunden' => $einzelner_kundeninfo
        ]);
    } */

    #[Route('/{id}', methods: ['GET'], name: 'details')]
    public function show(EntityManagerInterface $entityManager, $id, Request $request): Response
    {
        $entityType = $request->attributes->get('entityType');
    
        if ($entityType === 'kurse') {
            $entity = $entityManager->getRepository(Kurse::class)->find($id);
        } elseif ($entityType === 'kunden') {
            $entity = $entityManager->getRepository(Kunden::class)->find($id);
        } else {
            // Handle the case where the entity type is not recognized.
            throw $this->createNotFoundException('Invalid entity type');
        }
    
        if (!$entity) {
            throw $this->createNotFoundException('Entity not found');
        }
    
        // Render the appropriate template based on the entity type.
        return $this->render($entityType . '/show.html.twig', [
            'entity' => $entity,
        ]);
    }
    


}
