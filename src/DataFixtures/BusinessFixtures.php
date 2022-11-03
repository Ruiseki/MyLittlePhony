<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BusinessFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i=0; $i <20; $i++) { 
           
        }
        $manager->flush();
    }
}