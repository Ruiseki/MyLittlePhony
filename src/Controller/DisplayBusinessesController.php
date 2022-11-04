<?php

namespace App\Controller;

use App\Repository\BusinessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayBusinessesController extends AbstractController
{
    #[Route('/display/businesses', name: 'app_display_businesses')]
    public function index(BusinessRepository $businessRepository): Response
    {
        $result = $businessRepository->findAll();
        return $this->render('display_businesses/index.html.twig', [
            'controller_name' => 'DisplayBusinessesController',
            'businesses' => $result
        ]);
    }
}
