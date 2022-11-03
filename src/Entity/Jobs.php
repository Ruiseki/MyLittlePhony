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

    #[ORM\ManyToOne(inversedBy: 'Jobs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Business $Business = null;

    #[ORM\OneToMany(mappedBy: 'Jobs', targetEntity: Skills::class)]
    private Collection $Jobs;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function __construct()
    {
        $this->Jobs = new ArrayCollection();
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
    public function getJobs(): Collection
    {
        return $this->Jobs;
    }

    public function addJob(Skills $job): self
    {
        if (!$this->Jobs->contains($job)) {
            $this->Jobs->add($job);
            $job->setJobs($this);
        }

        return $this;
    }

    public function removeJob(Skills $job): self
    {
        if ($this->Jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getJobs() === $this) {
                $job->setJobs(null);
            }
        }

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
}
