<?php

namespace App\Entity;

use App\Repository\ResiduosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResiduosRepository::class)
 */
class Residuos
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
    private $ler;

    /**
     * @ORM\Column(type="text")
     */
    private $comentario;

    /**
     * @ORM\Column(type="integer")
     */
    private $peligro;

    /**
     * @ORM\Column(type="integer")
     */
    private $categoriaPeligrosidad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $unidad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Imagen;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="residuos")
     */
    private $empresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLer(): ?string
    {
        return $this->ler;
    }

    public function setLer(string $ler): self
    {
        $this->ler = $ler;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getPeligro(): ?int
    {
        return $this->peligro;
    }

    public function setPeligro(int $peligro): self
    {
        $this->peligro = $peligro;

        return $this;
    }

    public function getCategoriaPeligrosidad(): ?int
    {
        return $this->categoriaPeligrosidad;
    }

    public function setCategoriaPeligrosidad(int $categoriaPeligrosidad): self
    {
        $this->categoriaPeligrosidad = $categoriaPeligrosidad;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getUnidad(): ?string
    {
        return $this->unidad;
    }

    public function setUnidad(string $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->Imagen;
    }

    public function setImagen(?string $Imagen): self
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }
}
