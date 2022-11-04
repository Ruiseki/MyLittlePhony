<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobsRepository::class)]
class Jobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'BusinessJobs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Business $Business = null;

    #[ORM\ManyToMany(targetEntity: Skills::class, inversedBy: 'JobsSkills')]
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

    public function getDescription(): ?string
    {

        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBusiness(): ?Business
    {
        return $this->Business;
    }

    public function setBusiness(?Business $Business): self
    {
        $this->Business = $Business;

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
