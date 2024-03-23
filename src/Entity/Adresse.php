<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rue = null;

    #[ORM\Column(nullable: true)]
    private ?int $codePostal = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\OneToOne(mappedBy: 'adresse', cascade: ['persist', 'remove'])]
    private ?Employe $employe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): static
    {
        $this->rue = $rue;
        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(?int $codePostal): static
    {
        $this->codePostal = $codePostal;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;
        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(Employe $employe): static
    {
        // set the owning side of the relation if necessary
        if ($employe->getAdresse() !== $this) {
            $employe->setAdresse($this);
        }

        $this->employe = $employe;
    }

    public function __toString(): string {
        return $this->rue." ".$this->codePostal." ".$this->ville;
    }
}
