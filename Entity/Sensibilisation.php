<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use ApiPlatform\Core\Annotation\ApiProperty;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SensibilisationRepository")
 */
class Sensibilisation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @var MediaObject|null
     *
     * @ORM\ManyToOne(targetEntity=MediaObject::class)
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     */
    public $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }
}
