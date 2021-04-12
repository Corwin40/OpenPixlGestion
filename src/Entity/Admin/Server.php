<?php

namespace App\Entity\Admin;

use App\Repository\Admin\ServerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServerRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Server
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
    private $name;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cfgProc;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cfgMem;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cfgDrive;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ResInt;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $resExt;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ResMac;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ResUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $os;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $portSsh;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $portFtp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contrat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="servers")
     */
    private $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCfgProc(): ?string
    {
        return $this->cfgProc;
    }

    public function setCfgProc(?string $cfgProc): self
    {
        $this->cfgProc = $cfgProc;

        return $this;
    }

    public function getCfgMem(): ?string
    {
        return $this->cfgMem;
    }

    public function setCfgMem(?string $cfgMem): self
    {
        $this->cfgMem = $cfgMem;

        return $this;
    }

    public function getCfgDrive(): ?string
    {
        return $this->cfgDrive;
    }

    public function setCfgDrive(?string $cfgDrive): self
    {
        $this->cfgDrive = $cfgDrive;

        return $this;
    }

    public function getResInt(): ?string
    {
        return $this->ResInt;
    }

    public function setResInt(?string $ResInt): self
    {
        $this->ResInt = $ResInt;

        return $this;
    }

    public function getResExt(): ?string
    {
        return $this->resExt;
    }

    public function setResExt(?string $resExt): self
    {
        $this->resExt = $resExt;

        return $this;
    }

    public function getResMac(): ?string
    {
        return $this->ResMac;
    }

    public function setResMac(?string $ResMac): self
    {
        $this->ResMac = $ResMac;

        return $this;
    }

    public function getResUrl(): ?string
    {
        return $this->ResUrl;
    }

    public function setResUrl(?string $ResUrl): self
    {
        $this->ResUrl = $ResUrl;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(?string $Role): self
    {
        $this->Role = $Role;

        return $this;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(?string $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function getPortSsh(): ?string
    {
        return $this->portSsh;
    }

    public function setPortSsh(?string $portSsh): self
    {
        $this->portSsh = $portSsh;

        return $this;
    }

    public function getPortFtp(): ?string
    {
        return $this->portFtp;
    }

    public function setPortFtp(?string $portFtp): self
    {
        $this->portFtp = $portFtp;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->contrat;
    }

    public function setContrat(?string $contrat): self
    {
        $this->contrat = $contrat;

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

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setServers($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getServers() === $this) {
                $service->setServers(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
