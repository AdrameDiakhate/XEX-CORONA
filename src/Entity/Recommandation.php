<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RecommandationRepository")
 */
class Recommandation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $texte_recommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteRecommande(): ?string
    {
        return $this->texte_recommande;
    }

    public function setTexteRecommande(string $texte_recommande): self
    {
        $this->texte_recommande = $texte_recommande;

        return $this;
    }
}
