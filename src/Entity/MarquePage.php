<?php

namespace App\Entity;

use App\Repository\MarquePageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarquePageRepository::class)]
class MarquePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\ManyToMany(targetEntity: MotCles::class, inversedBy: 'marquePages')]
    private Collection $motCles;

    public function __construct()
    {
        $this->motCles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function getcommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setcommentaire(?string $commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return Collection<int, motCles>
     */
    public function getMotCles(): Collection
    {
        return $this->motCles;
    }

    public function addMotCle(motCles $motCle): static
    {
        if (!$this->motCles->contains($motCle)) {
            $this->motCles->add($motCle);
        }
        return $this;
    }

    public function removeMotCle(motCles $motCle): static
    {
        $this->motCles->removeElement($motCle);

        return $this;
    }
}
