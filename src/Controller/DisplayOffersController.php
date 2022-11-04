<?php

namespace App\Controller;

use App\Repository\JobsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayOffersController extends AbstractController
{
    #[Route('/offers', name: 'app_display_offers')]
    public function index(JobsRepository $jobsRepository): Response
    {
        $result = $jobsRepository->findAll();
        return $this->render('display_offers/index.html.twig', [
            'controller_name' => 'Offers',
            'offers' => $result,
        ]);
    }
}
