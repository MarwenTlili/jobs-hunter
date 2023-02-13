<?php

namespace App\Entity;

use App\Repository\SeekerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeekerRepository::class)
 */
class Seeker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civility;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="Seeker", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToMany(targetEntity=Job::class, inversedBy="seekersSaved")
     * @ORM\JoinTable(name="seeker_saved_jobs")
     */
    private $savedJobs;

    /**
     * @ORM\ManyToMany(targetEntity=Job::class, inversedBy="seekersApplyed")
     * @ORM\JoinTable(name="seeker_applyed_jobs")
     */
    private $applyedJobs;

    /**
     * @ORM\OneToOne(targetEntity=CV::class, inversedBy="seeker", cascade={"persist", "remove"})
     */
    private $cv;

    public function __construct()
    {
        $this->savedJobs = new ArrayCollection();
        $this->applyedJobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getSavedJobs(): Collection
    {
        return $this->savedJobs;
    }

    public function addSavedJob(Job $savedJob): self
    {
        if (!$this->savedJobs->contains($savedJob)) {
            $this->savedJobs[] = $savedJob;
        }

        return $this;
    }

    public function removeSavedJob(Job $savedJob): self
    {
        $this->savedJobs->removeElement($savedJob);

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getApplyedJobs(): Collection
    {
        return $this->applyedJobs;
    }

    public function addApplyedJob(Job $applyedJob): self
    {
        if (!$this->applyedJobs->contains($applyedJob)) {
            $this->applyedJobs[] = $applyedJob;
        }

        return $this;
    }

    public function removeApplyedJob(Job $applyedJob): self
    {
        $this->applyedJobs->removeElement($applyedJob);

        return $this;
    }

    public function __toString(){
        return $this->firstName.' '.$this->lastName;
    }

    public function getCv(): ?CV
    {
        return $this->cv;
    }

    public function setCv(?CV $cv): self
    {
        $this->cv = $cv;

        return $this;
    }
}
