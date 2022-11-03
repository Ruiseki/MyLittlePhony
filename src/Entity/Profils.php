<?php

namespace App\Entity;

use App\Repository\ProfilsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilsRepository::class)]
class Profils
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Skills::class, inversedBy: 'SkillUser')]
    private Collection $Skills;

    public function __construct()
    {
        $this->Skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Skills>
     */
    public function getSkills(): Collection
    {
        return $this->Skills;
    }

    public function addSkill(Skills $skill): self
    {
        if (!$this->Skills->contains($skill)) {
            $this->Skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skills $skill): self
    {
        $this->Skills->removeElement($skill);

        return $this;
    }
}
