<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ApiResource
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
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $cas_contacts;

    /**
     * @ORM\Column(type="integer")
     */
    private $cas_communautaires;

    /**
     * @ORM\Column(type="integer")
     */
    private $cas_importes;

    /**
     * @ORM\Column(type="integer")
     */
    private $nouveaux_gueris;

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
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCasContacts(): ?int
    {
        return $this->cas_contacts;
    }

    public function setCasContacts(int $cas_contacts): self
    {
        $this->cas_contacts = $cas_contacts;

        return $this;
    }

    public function getCasCommunautaires(): ?int
    {
        return $this->cas_communautaires;
    }

    public function setCasCommunautaires(int $cas_communautaires): self
    {
        $this->cas_communautaires = $cas_communautaires;

        return $this;
    }

    public function getCasImportes(): ?int
    {
        return $this->cas_importes;
    }

    public function setCasImportes(int $cas_importes): self
    {
        $this->cas_importes = $cas_importes;

        return $this;
    }

    public function getNouveauxGueris(): ?int
    {
        return $this->nouveaux_gueris;
    }

    public function setNouveauxGueris(int $nouveaux_gueris): self
    {
        $this->nouveaux_gueris = $nouveaux_gueris;

        return $this;
    }

    public function getTotalGueris(): ?int
    {
        return $this->total_gueris;
    }

    public function setTotalGueris(int $total_gueris): self
    {
        $this->total_gueris = $total_gueris;

        return $this;
    }
}
