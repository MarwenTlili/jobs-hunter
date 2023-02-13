<?php

namespace App\Entity;

use App\Repository\CVRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CVRepository::class)
 */
class CV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $lastUpdateAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $views;

    /**
     * @ORM\OneToOne(targetEntity=Document::class, inversedBy="cv", cascade={"persist", "remove"})
     */
    private $document;

    /**
     * @ORM\OneToOne(targetEntity=ProfessionalInformation::class, inversedBy="cv", cascade={"persist", "remove"})
     */
    private $professionalInformation;

    /**
     * @ORM\OneToOne(targetEntity=ProfessionalInterest::class, inversedBy="cv", cascade={"persist", "remove"})
     */
    private $professionalInterest;

    /**
     * @ORM\OneToOne(targetEntity=GeneralInformation::class, inversedBy="cv", cascade={"persist", "remove"})
     */
    private $generalInformation;

    /**
     * @ORM\OneToOne(targetEntity=SocialLink::class, inversedBy="cv", cascade={"persist", "remove"})
     */
    private $socialLink;

    /**
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="cv", orphanRemoval=true)
     */
    private $educations;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="cv", orphanRemoval=true)
     */
    private $experiences;

    /**
     * @ORM\OneToOne(targetEntity=Seeker::class, mappedBy="cv", cascade={"persist", "remove"})
     */
    private $seeker;

    public function __construct()
    {
        $this->educations = new ArrayCollection();
        $this->experiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastUpdateAt(): ?\DateTimeImmutable
    {
        return $this->lastUpdateAt;
    }

    public function setLastUpdateAt(?\DateTimeImmutable $lastUpdateAt): self
    {
        $this->lastUpdateAt = $lastUpdateAt;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getProfessionalInformation(): ?ProfessionalInformation
    {
        return $this->professionalInformation;
    }

    public function setProfessionalInformation(?ProfessionalInformation $professionalInformation): self
    {
        $this->professionalInformation = $professionalInformation;

        return $this;
    }

    public function getProfessionalInterest(): ?ProfessionalInterest
    {
        return $this->professionalInterest;
    }

    public function setProfessionalInterest(?ProfessionalInterest $professionalInterest): self
    {
        $this->professionalInterest = $professionalInterest;

        return $this;
    }

    public function getGeneralInformation(): ?GeneralInformation
    {
        return $this->generalInformation;
    }

    public function setGeneralInformation(?GeneralInformation $generalInformation): self
    {
        $this->generalInformation = $generalInformation;

        return $this;
    }

    public function getSocialLink(): ?SocialLink
    {
        return $this->socialLink;
    }

    public function setSocialLink(?SocialLink $socialLink): self
    {
        $this->socialLink = $socialLink;

        return $this;
    }

    /**
     * @return Collection|Education[]
     */
    public function getEducations(): Collection
    {
        return $this->educations;
    }

    public function addEducation(Education $education): self
    {
        if (!$this->educations->contains($education)) {
            $this->educations[] = $education;
            $education->setCv($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->educations->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getCv() === $this) {
                $education->setCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setCv($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCv() === $this) {
                $experience->setCv(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }

    public function getSeeker(): ?Seeker
    {
        return $this->seeker;
    }

    public function setSeeker(?Seeker $seeker): self
    {
        // unset the owning side of the relation if necessary
        if ($seeker === null && $this->seeker !== null) {
            $this->seeker->setCv(null);
        }

        // set the owning side of the relation if necessary
        if ($seeker !== null && $seeker->getCv() !== $this) {
            $seeker->setCv($this);
        }

        $this->seeker = $seeker;

        return $this;
    }
}
