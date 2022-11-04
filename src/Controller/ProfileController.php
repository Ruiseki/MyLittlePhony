<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\OfferFormType;
use App\Repository\ProfilsRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UserProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_userProfile')]
    public function index(ProfilsRepository $profileRepository, Request $request, EntityManagerInterface $entityMgr): Response
    {
        $profil = new Profile();
        

        return $this->render('userProfile/index.html.twig', [
            'controller_name' => 'UserProfileController',
        ]);
    }
}
