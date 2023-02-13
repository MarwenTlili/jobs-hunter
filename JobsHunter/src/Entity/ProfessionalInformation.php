<?php

namespace App\Entity;

use App\Repository\ProfessionalInformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionalInformationRepository::class)
 */
class ProfessionalInformation
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
    private $languages;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $skills;

    /**
     * @ORM\OneToOne(targetEntity=CV::class, mappedBy="professionalInformation", cascade={"persist", "remove"})
     */
    private $cv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguages(): ?string
    {
        return $this->languages;
    }

    public function setLanguages(?string $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): self
    {
        $this->skills = $skills;

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
            $this->cv->setProfessionalInformation(null);
        }

        // set the owning side of the relation if necessary
        if ($cv !== null && $cv->getProfessionalInformation() !== $this) {
            $cv->setProfessionalInformation($this);
        }

        $this->cv = $cv;

        return $this;
    }
}
