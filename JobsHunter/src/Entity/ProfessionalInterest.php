<?php

namespace App\Entity;

use App\Repository\ProfessionalInterestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionalInterestRepository::class)
 */
class ProfessionalInterest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jobType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wantedOccupation;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $wantedSalary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $actualStatus;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $findMeByCompany;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class)
     */
    private $professions;

    /**
     * @ORM\OneToOne(targetEntity=CV::class, mappedBy="professionalInterest", cascade={"persist", "remove"})
     */
    private $cv;

    public function __construct()
    {
        $this->professions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(?string $jobType): self
    {
        $this->jobType = $jobType;

        return $this;
    }

    public function getWantedOccupation(): ?string
    {
        return $this->wantedOccupation;
    }

    public function setWantedOccupation(?string $wantedOccupation): self
    {
        $this->wantedOccupation = $wantedOccupation;

        return $this;
    }

    public function getWantedSalary(): ?float
    {
        return $this->wantedSalary;
    }

    public function setWantedSalary(?float $wantedSalary): self
    {
        $this->wantedSalary = $wantedSalary;

        return $this;
    }

    public function getActualStatus(): ?string
    {
        return $this->actualStatus;
    }

    public function setActualStatus(?string $actualStatus): self
    {
        $this->actualStatus = $actualStatus;

        return $this;
    }

    public function getFindMeByCompany(): ?bool
    {
        return $this->findMeByCompany;
    }

    public function setFindMeByCompany(?bool $findMeByCompany): self
    {
        $this->findMeByCompany = $findMeByCompany;

        return $this;
    }

    /**
     * @return Collection|Profession[]
     */
    public function getProfessions(): Collection
    {
        return $this->professions;
    }

    public function addProfession(Profession $profession): self
    {
        if (!$this->professions->contains($profession)) {
            $this->professions[] = $profession;
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        $this->professions->removeElement($profession);

        return $this;
    }

    public function getCv(): ?CV
    {
        return $this->cv;
    }

    public function setCv(?CV $cv): self
    {
        // unset the owning side of the relation if necessary
        if ($cv === null && $this->cv !== null) {
            $this->cv->setProfessionalInterest(null);
        }

        // set the owning side of the relation if necessary
        if ($cv !== null && $cv->getProfessionalInterest() !== $this) {
            $cv->setProfessionalInterest($this);
        }

        $this->cv = $cv;

        return $this;
    }
}
