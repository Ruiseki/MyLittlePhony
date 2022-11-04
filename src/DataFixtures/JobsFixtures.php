<?php

namespace App\DataFixtures;

use App\Entity\Jobs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $job = new Jobs();
            $job->setDescription("Hi we search a new Poney for our business, 
            we're specialize in bakery and IT, Why we're hiring ? 
            Cause our very popular website:
             cookie Clicker new an update bla bla bla...");
            $job->setName('Cookie Poney Dev');
        }


        $manager->flush();
    }
}
