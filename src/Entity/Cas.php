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
    private $nouveaux_gueris;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_gueris;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nouveauxcontacts;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalcontacts;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nouveaucommunautaire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalcommunautaire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nouveauximportes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalimportes;

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

    public function getNouveauxcontacts(): ?int
    {
        return $this->nouveauxcontacts;
    }

    public function setNouveauxcontacts(int $nouveauxcontacts): self
    {
        $this->nouveauxcontacts = $nouveauxcontacts;

        return $this;
    }

    public function getTotalcontacts(): ?int
    {
        return $this->totalcontacts;
    }

    public function setTotalcontacts(?int $totalcontacts): self
    {
        $this->totalcontacts = $totalcontacts;

        return $this;
    }

    public function getNouveaucommunautaire(): ?int
    {
        return $this->nouveaucommunautaire;
    }

    public function setNouveaucommunautaire(?int $nouveaucommunautaire): self
    {
        $this->nouveaucommunautaire = $nouveaucommunautaire;

        return $this;
    }

    public function getTotalcommunautaire(): ?int
    {
        return $this->totalcommunautaire;
    }

    public function setTotalcommunautaire(?int $totalcommunautaire): self
    {
        $this->totalcommunautaire = $totalcommunautaire;

        return $this;
    }

    public function getNouveauximportes(): ?int
    {
        return $this->nouveauximportes;
    }

    public function setNouveauximportes(?int $nouveauximportes): self
    {
        $this->nouveauximportes = $nouveauximportes;

        return $this;
    }

    public function getTotalimportes(): ?int
    {
        return $this->totalimportes;
    }

    public function setTotalimportes(?int $totalimportes): self
    {
        $this->totalimportes = $totalimportes;

        return $this;
    }
}
