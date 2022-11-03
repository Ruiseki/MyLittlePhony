<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class User{
    private string $name;
    private string $lastname;
    private array $skills;
    private int $id;

    public function setName(string $name){
        $this->name = $name;
    }
    public function setLastName(string $lastname){
        $this->lastname = $lastname;
    }
    public function setSkills($skills){
        $this->skills = $skills;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public function getId(){
        return $this->id;
    }

    #[ORM\Column(length: 255)]
    public function getName(){
        return $this->name;
    }
    
    #[ORM\Column(length: 255)]
    public function getLastName(){
        return $this->lastname;
    }
    #[ORM\Column(length: 255)]
    public function getSkills(){
        return $this->skills;
    }
}