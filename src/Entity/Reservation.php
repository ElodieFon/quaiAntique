<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPersons = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbChildren = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comentaire = null;

    #[ORM\Column(nullable: true)]
    private ?bool $allergies = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?ReservationHoraire $heures = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNbPersons(): ?int
    {
        return $this->nbPersons;
    }

    public function setNbPersons(int $nbpersons): self
    {
        $this->nbPersons = $nbpersons;

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


    public function getNbChildren(): ?int
    {
        return $this->nbChildren;
    }

    public function setNbChildren(?int $nbChildren): self
    {
        $this->nbChildren = $nbChildren;

        return $this;
    }

    public function isAllergies(): ?bool
    {
        return $this->allergies;
    }

    public function setAllergies(bool $allergies): self
    {
        $this->allergies = $allergies;

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

    public function getHeures(): ?ReservationHoraire
    {
        return $this->heures;
    }

    public function setHeures(?ReservationHoraire $heures): self
    {
        $this->heures = $heures;

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
    public function __toString()
    {
        return $this->date->format('d-m-Y');
    }
}
