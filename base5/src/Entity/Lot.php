<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LotRepository")
 */
class Lot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numLot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Passeport", inversedBy="lot")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLot(): ?int
    {
        return $this->numLot;
    }

    public function setNumLot(?int $numLot): self
    {
        $this->numLot = $numLot;

        return $this;
    }

    public function getLot(): ?Passeport
    {
        return $this->lot;
    }

    public function setLot(?Passeport $lot): self
    {
        $this->lot = $lot;

        return $this;
    }
}
