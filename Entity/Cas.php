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
    private $new_case_today;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_cases;

    /**
     * @ORM\Column(type="integer")
     */
    private $new_death_today;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_deaths;

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

    public function getNewCaseToday(): ?int
    {
        return $this->new_case_today;
    }

    public function setNewCaseToday(int $new_case_today): self
    {
        $this->new_case_today = $new_case_today;

        return $this;
    }

    public function getTotalCases(): ?int
    {
        return $this->total_cases;
    }

    public function setTotalCases(int $total_cases): self
    {
        $this->total_cases = $total_cases;

        return $this;
    }

    public function getNewDeathToday(): ?int
    {
        return $this->new_death_today;
    }

    public function setNewDeathToday(int $new_death_today): self
    {
        $this->new_death_today = $new_death_today;

        return $this;
    }

    public function getTotalDeaths(): ?int
    {
        return $this->total_deaths;
    }

    public function setTotalDeaths(int $total_deaths): self
    {
        $this->total_deaths = $total_deaths;

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
