<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PasseportRepository")
 */
class Passeport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_demandeur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $prenom_demandeur;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $NIN;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $dossier_expedie;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_expedie;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $passeport_arrive;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_arrive;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $passeport_livre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_livre;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Observation", inversedBy="observation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lot", inversedBy="lot")
     * @ORM\JoinColumn(nullable=true)
     */
    private $lot;

    public function __construct()
    {
        $this->observation = new ArrayCollection();
        $this->lot = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDemandeur(): ?string
    {
        return $this->nom_demandeur;
    }

    public function setNomDemandeur(string $nom_demandeur): self
    {
        $this->nom_demandeur = $nom_demandeur;

        return $this;
    }

    public function getPrenomDemandeur(): ?string
    {
        return $this->prenom_demandeur;
    }

    public function setPrenomDemandeur(?string $prenom_demandeur): self
    {
        $this->prenom_demandeur = $prenom_demandeur;

        return $this;
    }

    public function getNIN(): ?string
    {
        return $this->NIN;
    }

    public function setNIN(?string $NIN): self
    {
        $this->NIN = $NIN;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDossierExpedie(): ?string
    {
        return $this->dossier_expedie;
    }

    public function setDossierExpedie(?string $dossier_expedie): self
    {
        $this->dossier_expedie = $dossier_expedie;

        return $this;
    }

    public function getDateExpedie(): ?\DateTimeInterface
    {
        return $this->date_expedie;
    }

    public function setDateExpedie(?\DateTimeInterface $date_expedie): self
    {
        $this->date_expedie = $date_expedie;

        return $this;
    }

    public function getPasseportArrive(): ?string
    {
        return $this->passeport_arrive;
    }

    public function setPasseportArrive(?string $passeport_arrive): self
    {
        $this->passeport_arrive = $passeport_arrive;

        return $this;
    }

    public function getDateArrive(): ?\DateTimeInterface
    {
        return $this->date_arrive;
    }

    public function setDateArrive(?\DateTimeInterface $date_arrive): self
    {
        $this->date_arrive = $date_arrive;

        return $this;
    }

    public function getPasseportLivre(): ?string
    {
        return $this->passeport_livre;
    }

    public function setPasseportLivre(?string $passeport_livre): self
    {
        $this->passeport_livre = $passeport_livre;

        return $this;
    }

    public function getDateLivre(): ?\DateTimeInterface
    {
        return $this->date_livre;
    }

    public function setDateLivre(\DateTimeInterface $date_livre): self
    {
        $this->date_livre = $date_livre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Observation[]
     */
    public function getObservation(): Collection
    {
        return $this->observation;
    }

    public function setObservation(?Observation $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function addObservation(Observation $observation): self
    {
        if (!$this->observation->contains($observation)) {
            $this->observation[] = $observation;
            $observation->setObservation($this);
        }

        return $this;
    }

    public function removeObservation(Observation $observation): self
    {
        if ($this->observation->contains($observation)) {
            $this->observation->removeElement($observation);
            // set the owning side to null (unless already changed)
            if ($observation->getObservation() === $this) {
                $observation->setObservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Lot[]
     */
    public function getLot(): Collection
    {
        return $this->lot;
    }

    public function setLot(?Lot $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function addLot(Lot $lot): self
    {
        if (!$this->lot->contains($lot)) {
            $this->lot[] = $lot;
            $lot->setLot($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): self
    {
        if ($this->lot->contains($lot)) {
            $this->lot->removeElement($lot);
            // set the owning side to null (unless already changed)
            if ($lot->getLot() === $this) {
                $lot->setLot(null);
            }
        }

        return $this;
    }
}
