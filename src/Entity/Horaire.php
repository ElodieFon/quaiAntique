<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $jour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $matinDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $matinFin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $apremDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $apremFin = null;

    #[ORM\Column]
    private ?bool $active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMatinDebut(): ?\DateTimeInterface
    {
        return $this->matinDebut;
    }

    public function setMatinDebut(\DateTimeInterface $matinDebut): self
    {
        $this->matinDebut = $matinDebut;

        return $this;
    }

    public function getMatinFin(): ?\DateTimeInterface
    {
        return $this->matinFin;
    }

    public function setMatinFin(\DateTimeInterface $matinFin): self
    {
        $this->matinFin = $matinFin;

        return $this;
    }

    public function getApremDebut(): ?\DateTimeInterface
    {
        return $this->apremDebut;
    }

    public function setApremDebut(\DateTimeInterface $apremDebut): self
    {
        $this->apremDebut = $apremDebut;

        return $this;
    }

    public function getApremFin(): ?\DateTimeInterface
    {
        return $this->apremFin;
    }

    public function setApremFin(\DateTimeInterface $apremFin): self
    {
        $this->apremFin = $apremFin;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
