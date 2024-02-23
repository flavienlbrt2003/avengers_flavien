<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateParution = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPages = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    private ?auteur $auteur_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(?\DateTimeInterface $dateParution): static
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    public function getNbPages(): ?int
    {
        return $this->nbPages;
    }

    public function setNbPages(?int $nbPages): static
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    public function getAuteurId(): ?auteur
    {
        return $this->auteur_id;
    }

    public function setAuteurId(?auteur $auteur_id): static
    {
        $this->auteur_id = $auteur_id;

        return $this;
    }
}
