<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DanceStyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DanceStyleRepository::class)]
#[ApiResource()]
class DanceStyle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Dancer>
     */
    #[ORM\OneToMany(mappedBy: 'dance_style', targetEntity: Dancer::class)]
    private Collection $dancers;

    /**
     * @var Collection<int, Dancer>
     */
    #[ORM\ManyToMany(targetEntity: Dancer::class, mappedBy: 'DancerStyle')]
    private Collection $dancer;

    public function __construct()
    {
        $this->dancers = new ArrayCollection();
        $this->dancer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Dancer>
     */
    public function getDancers(): Collection
    {
        return $this->dancers;
    }

    public function addDancer(Dancer $dancer): static
    {
        if (!$this->dancers->contains($dancer)) {
            $this->dancers->add($dancer);
            $dancer->setDanceStyle($this);
        }

        return $this;
    }

    public function removeDancer(Dancer $dancer): static
    {
        if ($this->dancers->removeElement($dancer)) {
            // set the owning side to null (unless already changed)
            if ($dancer->getDanceStyle() === $this) {
                $dancer->setDanceStyle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Dancer>
     */
    public function getDancer(): Collection
    {
        return $this->dancer;
    }

    public function __toString()
    {
        return $this->name;
    }
}
