<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileFormType;
use App\Repository\ProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_userProfile')]
    public function index(ProfileRepository $profileRepository, Request $request, EntityManagerInterface $entityMgr): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileFormType::class, $profile);
        $form->handleRequest($request);
        // $bddProfile = $profileRepository->findOneBy(['name' => ]);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityMgr->persist($profile);
            $entityMgr->flush(); 
         }
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'UserProfileController',
            'form' => $form->createView(),
        ]);
    }
}
