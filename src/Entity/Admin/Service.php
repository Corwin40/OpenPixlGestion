<?php

namespace App\Entity\Admin;

use App\Repository\Admin\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Service
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="services")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Server::class, inversedBy="services")
     */
    private $servers;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean")
     */
    private $firstreminder;

    /**
     * @ORM\Column(type="boolean")
     */
    private $secondreminder;

    /**
     * @ORM\Column(type="boolean")
     */
    private $thirdreminder;

    /**
     * @ORM\ManyToOne(targetEntity=TypeServ::class, inversedBy="services")
     */
    private $Service;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAt(): self
    {
        $this->createdAt = new \DateTime('now');

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setUpdatedAt(): self
    {
        $this->updatedAt = new \DateTime('now');

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getServers(): ?Server
    {
        return $this->servers;
    }

    public function setServers(?Server $servers): self
    {
        $this->servers = $servers;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setBirthday(): self
    {
        $this->birthday = new \DateTime('+1years');

        return $this;
    }

    public function getFirstreminder(): ?bool
    {
        return $this->firstreminder;
    }

    public function setFirstreminder(bool $firstreminder): self
    {
        $this->firstreminder = $firstreminder;

        return $this;
    }

    public function getSecondreminder(): ?bool
    {
        return $this->secondreminder;
    }

    public function setSecondreminder(bool $secondreminder): self
    {
        $this->secondreminder = $secondreminder;

        return $this;
    }

    public function getThirdreminder(): ?bool
    {
        return $this->thirdreminder;
    }

    public function setThirdreminder(bool $thirdreminder): self
    {
        $this->thirdreminder = $thirdreminder;

        return $this;
    }

    public function getService(): ?TypeServ
    {
        return $this->Service;
    }

    public function setService(?TypeServ $Service): self
    {
        $this->Service = $Service;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
