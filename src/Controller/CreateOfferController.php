<?php

namespace App\Controller;

use App\Entity\Jobs;
use App\Form\OfferFormType;
use App\Repository\BusinessRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class CreateOfferController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/create/offer', name: 'app_create_offer')]
    public function index(BusinessRepository $BusinessRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $offer = new Jobs();
        $all_businesses = $BusinessRepository->findAll();
        $form = $this->createForm(OfferFormType::class, $offer);

        $form->handleRequest($request);
        $offer->setBusiness($all_businesses[0]);

        if ($form->isSubmitted() && $form->isValid()) {
           $entityManager->persist($offer);
           $entityManager->flush(); 
           return $this->render('base.html.twig', [
            'controller_name' => 'HomeController'
        ]
        );
        }
        return $this->render('create_offer/index.html.twig', [
            'controller_name' => 'CreateOfferController',
            'form' => $form->createView(),
            
        ]);
    }

    public function createSkills(Response $response){
        
    }

}
