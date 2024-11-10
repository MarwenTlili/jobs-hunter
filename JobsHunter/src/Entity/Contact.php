<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isOpen;

    public function getId(): ?int {
        return $this->id;
    }

    public function getFullName(): ?string {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setMessage(string $message): self {
        $this->message = $message;

        return $this;
    }

    public function getIsOpen(): ?bool {
        return $this->isOpen;
    }

    public function setIsOpen(?bool $isOpen): self {
        $this->isOpen = $isOpen;

        return $this;
    }

    // To display the status field in admin dashboard
    function getStatus(): ?string {
        return $this->getIsOpen();
    }
}
