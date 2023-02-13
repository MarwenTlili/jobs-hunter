<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Job
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $expireAt;

    /**
     * @ORM\Column(type="smallint")
     */
    private $postsNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $experienceMin;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $experienceMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $educationLevel;

    /**
     * @ORM\Column(type="integer", nullable=true, nullable=true)
     */
    private $salaryMin;

    /**
     * @ORM\Column(type="integer", nullable=true, nullable=true)
     */
    private $salayMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $requiredLanguages;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $requirements;

    /**
     * @ORM\ManyToMany(targetEntity=Seeker::class, mappedBy="savedJobs")
     */
    private $seekersSaved;

    /**
     * @ORM\ManyToMany(targetEntity=Seeker::class, mappedBy="applyedJobs")
     */
    private $seekersApplyed;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Company;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="jobs")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, inversedBy="jobs")
     */
    private $professions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function __construct()
    {
        $this->seekersSaved = new ArrayCollection();
        $this->seekersApplyed = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->professions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

     /**
     * @ORM\PrePersist
     */
    public function setCreatedAt(): self
    {
        $this->createdAt = new \DateTimeImmutable();

        return $this;
    }

    public function getExpireAt(): ?\DateTimeImmutable
    {
        return $this->expireAt;
    }

    public function setExpireAt(\DateTimeImmutable $expireAt): self
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    public function getPostsNumber(): ?int
    {
        return $this->postsNumber;
    }

    public function setPostsNumber(int $postsNumber): self
    {
        $this->postsNumber = $postsNumber;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getExperienceMin(): ?int
    {
        return $this->experienceMin;
    }

    public function setExperienceMin(int $experienceMin): self
    {
        $this->experienceMin = $experienceMin;

        return $this;
    }

    public function getExperienceMax(): ?int
    {
        return $this->experienceMax;
    }

    public function setExperienceMax(int $experienceMax): self
    {
        $this->experienceMax = $experienceMax;

        return $this;
    }

    public function getEducationLevel(): ?string
    {
        return $this->educationLevel;
    }

    public function setEducationLevel(string $educationLevel): self
    {
        $this->educationLevel = $educationLevel;

        return $this;
    }

    public function getRequiredLanguages(): ?string
    {
        return $this->requiredLanguages;
    }

    public function setRequiredLanguages(string $requiredLanguages): self
    {
        $this->requiredLanguages = $requiredLanguages;

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

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(string $requirements): self
    {
        $this->requirements = $requirements;

        return $this;
    }

    /**
     * @return Collection|Seeker[]
     */
    public function getSeekersSaved(): Collection
    {
        return $this->seekersSaved;
    }

    public function addSeekersSaved(Seeker $seekersSaved): self
    {
        if (!$this->seekersSaved->contains($seekersSaved)) {
            $this->seekersSaved[] = $seekersSaved;
            $seekersSaved->addSavedJob($this);
        }

        return $this;
    }

    public function removeSeekersSaved(Seeker $seekersSaved): self
    {
        if ($this->seekersSaved->removeElement($seekersSaved)) {
            $seekersSaved->removeSavedJob($this);
        }

        return $this;
    }

    /**
     * @return Collection|Seeker[]
     */
    public function getSeekersApplyed(): Collection
    {
        return $this->seekersApplyed;
    }

    public function addSeekersApplyed(Seeker $seekersApplyed): self
    {
        if (!$this->seekersApplyed->contains($seekersApplyed)) {
            $this->seekersApplyed[] = $seekersApplyed;
            $seekersApplyed->addApplyedJob($this);
        }

        return $this;
    }

    public function removeSeekersApplyed(Seeker $seekersApplyed): self
    {
        if ($this->seekersApplyed->removeElement($seekersApplyed)) {
            $seekersApplyed->removeApplyedJob($this);
        }

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->Company;
    }

    public function setCompany(?Company $Company): self
    {
        $this->Company = $Company;

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
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    public function getSalaryMin(): ?int
    {
        return $this->salaryMin;
    }

    public function setSalaryMin(?int $salaryMin): self
    {
        $this->salaryMin = $salaryMin;

        return $this;
    }

    public function getSalayMax(): ?int
    {
        return $this->salayMax;
    }

    public function setSalayMax(?int $salayMax): self
    {
        $this->salayMax = $salayMax;

        return $this;
    }

    public function __toString(){
        return $this->getTitle();
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setSlug(): self{
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($this->getTitle());
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
}
