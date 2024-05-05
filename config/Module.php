<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdModule = null;

    #[ORM\Column(length: 50)]
    private ?string $NomModule = null;

    #[ORM\Column(length: 255)]
    private ?string $DEscModule = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreateAt = null;

    /**
     * @var Collection<int, Measurement>
     */
    #[ORM\OneToMany(targetEntity: Measurement::class, mappedBy: 'module')]
    private Collection $Measurement;

    public function __construct()
    {
        $this->Measurement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdModule(): ?int
    {
        return $this->IdModule;
    }

    public function setIdModule(int $IdModule): static
    {
        $this->IdModule = $IdModule;

        return $this;
    }

    public function getNomModule(): ?string
    {
        return $this->NomModule;
    }

    public function setNomModule(string $NomModule): static
    {
        $this->NomModule = $NomModule;

        return $this;
    }

    public function getDEscModule(): ?string
    {
        return $this->DEscModule;
    }

    public function setDEscModule(string $DEscModule): static
    {
        $this->DEscModule = $DEscModule;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->CreateAt;
    }

    public function setCreateAt(\DateTimeImmutable $CreateAt): static
    {
        $this->CreateAt = $CreateAt;

        return $this;
    }

    /**
     * @return Collection<int, Measurement>
     */
    public function getMeasurement(): Collection
    {
        return $this->Measurement;
    }

    public function addMeasurement(Measurement $measurement): static
    {
        if (!$this->Measurement->contains($measurement)) {
            $this->Measurement->add($measurement);
            $measurement->setModule($this);
        }

        return $this;
    }

    public function removeMeasurement(Measurement $measurement): static
    {
        if ($this->Measurement->removeElement($measurement)) {
            // set the owning side to null (unless already changed)
            if ($measurement->getModule() === $this) {
                $measurement->setModule(null);
            }
        }

        return $this;
    }
}
