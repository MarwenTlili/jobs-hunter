<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EducationRepository::class)
 */
class Education
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
    private $diplomaTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $educationLevel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $establishment;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $startAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $current;

    /**
     * @ORM\ManyToOne(targetEntity=CV::class, inversedBy="educations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiplomaTitle(): ?string
    {
        return $this->diplomaTitle;
    }

    public function setDiplomaTitle(?string $diplomaTitle): self
    {
        $this->diplomaTitle = $diplomaTitle;

        return $this;
    }

    public function getEducationLevel(): ?string
    {
        return $this->educationLevel;
    }

    public function setEducationLevel(?string $educationLevel): self
    {
        $this->educationLevel = $educationLevel;

        return $this;
    }

    public function getEstablishment(): ?string
    {
        return $this->establishment;
    }

    public function setEstablishment(?string $establishment): self
    {
        $this->establishment = $establishment;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(?\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getCurrent(): ?bool
    {
        return $this->current;
    }

    public function setCurrent(?bool $current): self
    {
        $this->current = $current;

        return $this;
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
