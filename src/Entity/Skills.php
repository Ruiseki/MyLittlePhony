<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillsRepository::class)]
class Skills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Profils::class, mappedBy: 'Skills')]
    private Collection $SkillUser;

    #[ORM\ManyToMany(targetEntity: Jobs::class, mappedBy: 'Skills')]
    private Collection $JobsSkills;

    public function __construct()
    {
        $this->SkillUser = new ArrayCollection();
        $this->JobsSkills = new ArrayCollection();
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
     * @return Collection<int, Profils>
     */
    public function getSkillUser(): Collection
    {
        return $this->SkillUser;
    }

    public function addSkillUser(Profils $skillUser): self
    {
        if (!$this->SkillUser->contains($skillUser)) {
            $this->SkillUser->add($skillUser);
            $skillUser->addSkill($this);
        }

        return $this;
    }

    public function removeSkillUser(Profils $skillUser): self
    {
        if ($this->SkillUser->removeElement($skillUser)) {
            $skillUser->removeSkill($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Jobs>
     */
    public function getJobsSkills(): Collection
    {
        return $this->JobsSkills;
    }

    public function addJobsSkill(Jobs $jobsSkill): self
    {
        if (!$this->JobsSkills->contains($jobsSkill)) {
            $this->JobsSkills->add($jobsSkill);
            $jobsSkill->addSkill($this);
        }

        return $this;
    }

    public function removeJobsSkill(Jobs $jobsSkill): self
    {
        if ($this->JobsSkills->removeElement($jobsSkill)) {
            $jobsSkill->removeSkill($this);
        }

        return $this;
    }


}