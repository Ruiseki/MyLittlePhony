<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class UsersFixtures extends Fixture{
    public function load(ObjectManager $manager){

        for ($i=0; $i < 20; $i++) { 
            $name = "user" . " " . $i;
            $lastname = "pedro";
            $skills = "{
                0:'java',
                1:'sql',
                2:'pain aux choco',
                3:'php'}";
    
            $user = new User();
    
            $user->setName($name);
            $user->setLastName($lastname);
            $user->setSkills($skills);
    
            $manager->persist($user);
        }
        $manager->flush();
    }
}