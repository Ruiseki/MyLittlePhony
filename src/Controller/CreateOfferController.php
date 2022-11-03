<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateOfferController extends AbstractController
{
    #[Route('/create/offer', name: 'app_create_offer')]
    public function index(): Response
    {
        return $this->render('create_offer/index.html.twig', [
            'controller_name' => 'CreateOfferController',
        ]);
    }

    public function createJob(Response $response){
        $job = new Job();
        $job = setTitle($response.title);
        $job = setDescription($response.description);
    }

    public function createSkills(Response $response){
        
    }
}
