<?php

namespace App\Controller;

use App\Repository\JobsRepository;
use App\Repository\ProfileRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayMatchController extends AbstractController
{
    #[Route('/match', name: 'app_match_profiles')]
    public function index(JobsRepository $jobsRepository, ProfileRepository $profileRepository): Response
    {
        $result = $jobsRepository->Findall();
        $result2 = $profileRepository->Findall();
        return $this->render('display_match/index.html.twig', [
            'controller_name' => "matching",
            'jobs' => $result,
            'profiles' => $result2,
        ]);
    }
}
