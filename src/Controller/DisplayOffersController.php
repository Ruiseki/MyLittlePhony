<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayOffersController extends AbstractController
{   
    #[Route('/offers', name: 'app_display_offers')]
    public function index(): Response
    {

        return $this->render('display_offers/index.html.twig', [
            'controller_name' => 'Offers',
            'offers' => array('offers1', 'offers2')
        ]);
    }
}
