<?php

namespace App\Entity;

use App\Repository\MotClesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotClesRepository::class)]
class MotCles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToMany(targetEntity: MarquePage::class, mappedBy: 'motCles')]
    private Collection $marquePages;

    public function __construct()
    {
        $this->marquePages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, MarquePage>
     */
    public function getMarquePages(): Collection
    {
        return $this->marquePages;
    }

    public function addMarquePage(MarquePage $marquePage): static
    {
        if (!$this->marquePages->contains($marquePage)) {
            $this->marquePages->add($marquePage);
            $marquePage->addMotCle($this);
        }
        return $this;
    }

    public function removeMarquePage(MarquePage $marquePage): static
    {
        if ($this->marquePages->removeElement($marquePage)) {
            $marquePage->removeMotCle($this);
        }

        return $this;
    }

    public function __toString(): string {
        return $this->libelle;
    }
}
