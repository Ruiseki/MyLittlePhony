<?php

namespace App\DataFixtures;

use App\Entity\Business;
use App\Entity\Jobs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Skills;
use App\Entity\Profils;
use Doctrine\ORM\Mapping\Id;

class SkillsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skills_list = ["Management", "communication", "Git", "Java", "Javascript", "Python", "Android", "IOS", "Web", "App", "mobile", "Windows", "Linux", "Unix", "Bash", "Crypto", "English", "Spanish", "German", "Italian", "Chinese", "Arabic", "Polish", "Oral expression"];
        $profile_name_list = ["Didier", "Rene", "Jean", "Michel", "Francois", "Abed", "Pradish", "Apu", "Ali", "Micheline"];
        $jobs_name_list = ["Graphist", "Web develloper", "technical Support", "Lead dev", "Server assistant", "Project Manager", "half-course develloper", "Web integrator", "Mobile app integrator"];
        $compagnies_info = [
            ["Umbrella Inc.", "08 09 09 09 09"],
            ["P. Inc.", "03 45 12 29 69"],
            ["SPACE-1222 Inc.", "03 65 13 12 22"],
            ["SPACE-2333 Inc.", "03 65 13 23 33"],
            ["SPACE-3444 Inc.", "03 65 13 34 44"],
        ];
        $skills = [];
        $jobs = [];
        $businesses = [];
        // SKILLS   √
        for ($i = 0; $i < (count($skills_list)); $i++) {
            $skills[$i] = new Skills();
            $skills[$i]->setName($skills_list[$i]);
            $manager->persist($skills[$i]);
        }
        // BUSINESSES √
        for ($i = 0; $i < (count($compagnies_info)); $i++) {
            $businesses[$i] = new Business();
            $businesses[$i]->setName($compagnies_info[$i][0]);
            $businesses[$i]->setPhone($compagnies_info[$i][1]);
            $manager->persist($businesses[$i]);
        }
        // JOBS √
        for ($i = 0; $i < (count($jobs_name_list)); $i++) {
            $jobs[$i] = new Jobs();
            $jobs[$i]->setName($jobs_name_list[$i]);
            $jobs[$i]->setBusiness($businesses[random_int(0, count($businesses) - 1)]);
            $tempo_list_skills = [];
            for ($j = 0; $j < random_int(1, 8); $j++) {
                $random_skill = $skills[random_int(0, count($skills) - 1)];
                if (in_array($random_skill, $tempo_list_skills) != True) {
                    array_push($tempo_list_skills, $random_skill);
                }
            }
            foreach ($tempo_list_skills as $key => $value) {
                $jobs[$i]->addSkill($tempo_list_skills[$key]);
            }
            $jobs[$i]->setDescription("Here is the description");
            $manager->persist($jobs[$i]);
        }
        // PROFILES √
        for ($i = 0; $i < (count($profile_name_list)); $i++) {
            $profile = new Profils();
            $profile->setName($profile_name_list[$i]);
            $manager->persist($profile);
            for ($j = 0; $j < random_int(1, 3); $j++) {
                $profile->addSkill($skills[random_int(0, count($skills) - 1)]);
            }
        }


        $manager->flush();
    }
}
