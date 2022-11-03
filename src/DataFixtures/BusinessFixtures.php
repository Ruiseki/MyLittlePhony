<?php

namespace App\DataFixtures;

use App\Entity\Business;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BusinessFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i=0; $i <20; $i++) { 
            $business = new Business();
            $business->setName("Business" . strval($i));
            $business->setPhone("0680586910");
        }
        $manager->flush();
    }
}