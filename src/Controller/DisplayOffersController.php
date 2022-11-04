<?php

namespace App\Controller;

use App\Entity\Skills;
use App\Repository\JobsRepository;
use App\Repository\SkillsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayOffersController extends AbstractController
{
    #[Route('/offers', name: 'app_display_offers')]
    public function index(JobsRepository $jobsRepository, SkillsRepository $skillsRepository): Response
    {
        $result = $jobsRepository->findAll();
        $result2 = $skillsRepository->findAll();
        return $this->render('display_offers/index.html.twig', [
            'controller_name' => 'Offers',
            'offers' => $result,
        ]);
    }
}
