<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Skills;

class SkillsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $skills_list = ["Management", "communication", "Git", "Java", "Javascript", "python"];

        for ($i = 0; $i < (count($skills_list)); $i++) {
            $skill = new Skills();
            $skill->setName($skills_list[$i]);
            $manager->persist($skill);
        }

        $manager->flush();
    }
}
