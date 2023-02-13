<?php

namespace App\Entity;

use App\Repository\GeneralInformationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GeneralInformationRepository::class)
 */
class GeneralInformation
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
    private $photo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motivation;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $haveDrivingLicence;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ownACar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone2;

    /**
     * @ORM\OneToOne(targetEntity=CV::class, mappedBy="generalInformation", cascade={"persist", "remove"})
     */
    private $cv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(?string $motivation): self
    {
        $this->motivation = $motivation;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(?int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getHaveDrivingLicence(): ?bool
    {
        return $this->haveDrivingLicence;
    }

    public function setHaveDrivingLicence(?bool $haveDrivingLicence): self
    {
        $this->haveDrivingLicence = $haveDrivingLicence;

        return $this;
    }

    public function getOwnACar(): ?bool
    {
        return $this->ownACar;
    }

    public function setOwnACar(?bool $ownACar): self
    {
        $this->ownACar = $ownACar;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;

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
            $this->cv->setGeneralInformation(null);
        }

        // set the owning side of the relation if necessary
        if ($cv !== null && $cv->getGeneralInformation() !== $this) {
            $cv->setGeneralInformation($this);
        }

        $this->cv = $cv;

        return $this;
    }

    public function __toString()
    {
        return $this->getId()."";
    }
}
