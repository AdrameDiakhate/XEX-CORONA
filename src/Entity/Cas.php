<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CasRepository")
 */
class Cas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nouveau_cas;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_cas;

    /**
     * @ORM\Column(type="integer")
     */
    private $nouveau_deces;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_deces;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="cas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_gueris;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNouveauCas(): ?int
    {
        return $this->nouveau_cas;
    }

    public function setNouveauCas(int $nouveau_cas): self
    {
        $this->nouveau_cas = $nouveau_cas;

        return $this;
    }

    public function getTotalCas(): ?int
    {
        return $this->total_cas;
    }

    public function setTotalCas(int $total_cas): self
    {
        $this->total_cas = $total_cas;

        return $this;
    }

    public function getNouveauDeces(): ?int
    {
        return $this->nouveau_deces;
    }

    public function setNouveauDeces(int $nouveau_deces): self
    {
        $this->nouveau_deces = $nouveau_deces;

        return $this;
    }

    public function getTotalDeces(): ?int
    {
        return $this->total_deces;
    }

    public function setTotalDeces(int $total_deces): self
    {
        $this->total_deces = $total_deces;

        return $this;
    }

    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getTotalGueris(): ?int
    {
        return $this->totalGueris;
    }

    public function setTotalGueris(int $totalGueris): self
    {
        $this->totalGueris = $totalGueris;

        return $this;
    }
}
