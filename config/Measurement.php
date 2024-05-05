<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdMesure = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $ValueMesure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $RecordeAT = null;

    #[ORM\ManyToOne(inversedBy: 'Measurement')]
    private ?Module $module = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMesure(): ?int
    {
        return $this->IdMesure;
    }

    public function setIdMesure(int $IdMesure): static
    {
        $this->IdMesure = $IdMesure;

        return $this;
    }

    public function getValueMesure(): ?string
    {
        return $this->ValueMesure;
    }

    public function setValueMesure(string $ValueMesure): static
    {
        $this->ValueMesure = $ValueMesure;

        return $this;
    }

    public function getRecordeAT(): ?\DateTimeImmutable
    {
        return $this->RecordeAT;
    }

    public function setRecordeAT(\DateTimeImmutable $RecordeAT): static
    {
        $this->RecordeAT = $RecordeAT;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): static
    {
        $this->module = $module;

        return $this;
    }
}
