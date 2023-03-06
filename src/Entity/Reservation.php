<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameClient = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $nbPersons = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?ReservationHoraire $heure = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbChildren = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comentaire = null;

    #[ORM\Column(nullable: true)]
    private ?bool $allergie = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $user = null;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameClient(): ?string
    {
        return $this->nameClient;
    }

    public function setNameClient(string $nameClient): self
    {
        $this->nameClient = $nameClient;

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

    public function getNbPersons(): ?int
    {
        return $this->nbPersons;
    }

    public function setNbPersons(int $nbPersons): self
    {
        $this->nbPersons = $nbPersons;

        return $this;
    }


 

    
    public function __toString()
    {
       
        return $this->nameClient;
        return $this->date->format('d-m-Y');
    }

    public function getHeure(): ?ReservationHoraire
    {
        return $this->heure;
    }

    public function setHeure(?ReservationHoraire $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getNbChildren(): ?int
    {
        return $this->nbChildren;
    }

    public function setNbChildren(?int $nbChildren): self
    {
        $this->nbChildren = $nbChildren;

        return $this;
    }

    public function getComentaire(): ?string
    {
        return $this->comentaire;
    }

    public function setComentaire(?string $comentaire): self
    {
        $this->comentaire = $comentaire;

        return $this;
    }

    public function isAllergie(): ?bool
    {
        return $this->allergie;
    }

    public function setAllergie(?bool $allergie): self
    {
        $this->allergie = $allergie;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
