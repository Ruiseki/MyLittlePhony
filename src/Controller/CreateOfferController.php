<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateOfferController extends AbstractController
{
    protected $title;
    protected $enterprise;
    protected $description;
    protected $html = "HTML/CSS";
    protected $js = "JS";
    protected $java = "Java";
    protected $php = "PHP";
    protected $laravel = "Laravel";
    protected $symfony = "Symfony";

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getEnterprise(): string
    {
        return $this->Enterprise;
    }

    public function setEnterprise(string $enterprise): void
    {
        $this->enterprise = $enterprise;
    }

    public function getDescription(): string
    {
        return $this->Description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    #[Route('/create/offer', name: 'app_create_offer')]
    public function index(): Response
    {
        return $this->render('create_offer/index.html.twig', [
            'controller_name' => 'CreateOfferController',
        ]);
    }

    public function createJob(Response $response){
        // $job = new Job();
        // $job = setTitle($response.title);
        // $job = setEnterprise($response.value["enterprise"])
        // $job = setDescription($response.description);
    }

    public function createSkills(Response $response){
        
    }
}
