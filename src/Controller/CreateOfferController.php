<?php

namespace App\Controller;

use App\Entity\Jobs;
use App\Form\OfferFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateOfferController extends AbstractController
{

    #[Route('/create/offer', name: 'app_create_offer')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offer = new Jobs();

        $form = $this->createForm(OfferFormType::class, $offer);

        $form->handleRequest($request);

        return $this->render('create_offer/index.html.twig', [
            'controller_name' => 'CreateOfferController',
            'form' => $form->createView(),
            
        ]);
    }

    public function createSkills(Response $response){
        
    }
}
