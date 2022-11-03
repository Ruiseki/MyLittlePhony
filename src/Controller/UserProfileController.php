<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_userProfile')]
    public function index(): Response
    {
        return $this->render('userProfile/index.html.twig', [
            'controller_name' => 'UserProfileController',
        ]);
    }
}
