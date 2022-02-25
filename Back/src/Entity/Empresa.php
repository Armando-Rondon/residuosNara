<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

/**
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $sector;

    /**
     * @ORM\OneToMany(targetEntity=Residuos::class, mappedBy="empresa")
     */
    private $residuos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localidad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    public function __construct($username)
    {
        parent::__construct($username);
        $this->residuos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * @return Collection|Residuos[]
     */
    public function getResiduos(): Collection
    {
        return $this->residuos;
    }

    public function addResiduo(Residuos $residuo): self
    {
        if (!$this->residuos->contains($residuo)) {
            $this->residuos[] = $residuo;
            $residuo->setEmpresa($this);
        }

        return $this;
    }

    public function removeResiduo(Residuos $residuo): self
    {
        if ($this->residuos->removeElement($residuo)) {
            // set the owning side to null (unless already changed)
            if ($residuo->getEmpresa() === $this) {
                $residuo->setEmpresa(null);
            }
        }

        return $this;
    }

    public function getLocalidad(): ?string
    {
        return $this->localidad;
    }

    public function setLocalidad(?string $localidad): self
    {
        $this->localidad = $localidad;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function getRoles() 
    {
        $roles = $this->rol;
        $roles[] = 'ROLE_EMPRESA';
        return $roles;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
