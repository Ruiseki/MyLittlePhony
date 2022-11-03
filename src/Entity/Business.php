<?php

namespace App\Entity;

use App\Repository\BusinessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusinessRepository::class)]
class Business
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?string $phone = null;

    #[ORM\OneToMany(mappedBy: 'Business', targetEntity: Jobs::class, orphanRemoval: true)]
    private Collection $Jobs;

    #[ORM\OneToMany(mappedBy: 'Business', targetEntity: Jobs::class)]
    private Collection $BusinessJobs;

    public function __construct()
    {
        $this->Jobs = new ArrayCollection();
        $this->BusinessJobs = new ArrayCollection();
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Jobs>
     */
    public function getJobs(): Collection
    {
        return $this->Jobs;
    }

    public function addJob(Jobs $job): self
    {
        if (!$this->Jobs->contains($job)) {
            $this->Jobs->add($job);
            $job->setBusiness($this);
        }

        return $this;
    }

    public function removeJob(Jobs $job): self
    {
        if ($this->Jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getBusiness() === $this) {
                $job->setBusiness(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Jobs>
     */
    public function getBusinessJobs(): Collection
    {
        return $this->BusinessJobs;
    }

    public function addBusinessJob(Jobs $businessJob): self
    {
        if (!$this->BusinessJobs->contains($businessJob)) {
            $this->BusinessJobs->add($businessJob);
            $businessJob->setBusiness($this);
        }

        return $this;
    }

    public function removeBusinessJob(Jobs $businessJob): self
    {
        if ($this->BusinessJobs->removeElement($businessJob)) {
            // set the owning side to null (unless already changed)
            if ($businessJob->getBusiness() === $this) {
                $businessJob->setBusiness(null);
            }
        }

        return $this;
    }
}
