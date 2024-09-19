<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DancerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: DancerRepository::class)]
#[ApiResource()]


class Dancer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $biography = null;

    #[ORM\ManyToOne(inversedBy: 'dancers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DanceStyle $dance_style = null;

    #[ORM\Column]
    private ?bool $available = null;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(mappedBy: 'dancer', targetEntity: Appointment::class)]
    private Collection $appointments;

    /**
     * @var Collection<int, DanceStyle>
     */
    #[ORM\ManyToMany(targetEntity: DanceStyle::class, inversedBy: 'dancer')]
    private Collection $DancerStyle;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
        $this->DancerStyle = new ArrayCollection();
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

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): static
    {
        $this->biography = $biography;

        return $this;
    }

    public function getDanceStyle(): ?DanceStyle
    {
        return $this->dance_style;
    }

    public function setDanceStyle(?DanceStyle $dance_style): static
    {
        $this->dance_style = $dance_style;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): static
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

    public function addAppointment(Appointment $appointment): static
    {
        if (!$this->appointments->contains($appointment)) {
            $this->appointments->add($appointment);
            $appointment->setDancer($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getDancer() === $this) {
                $appointment->setDancer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DanceStyle>
     */
    public function getDancerStyle(): Collection
    {
        return $this->DancerStyle;
    }

    public function addDancerStyle(DanceStyle $dancerStyle): static
    {
        if (!$this->DancerStyle->contains($dancerStyle)) {
            $this->DancerStyle->add($dancerStyle);
        }

        return $this;
    }

    public function removeDancerStyle(DanceStyle $dancerStyle): static
    {
        $this->DancerStyle->removeElement($dancerStyle);

        return $this;
    }
}
