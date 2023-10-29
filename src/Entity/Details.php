<?php

namespace App\Entity;

use App\Repository\DetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailsRepository::class)]
class Details
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $kunde = null;

    #[ORM\Column(length: 255)]
    private ?string $kurs = null;

    #[ORM\Column]
    private ?bool $abgeschlossen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKunde(): ?string
    {
        return $this->kunde;
    }

    public function setKunde(string $kunde): static
    {
        $this->kunde = $kunde;

        return $this;
    }

    public function getKurs(): ?string
    {
        return $this->kurs;
    }

    public function setKurs(string $kurs): static
    {
        $this->kurs = $kurs;

        return $this;
    }

    public function isAbgeschlossen(): ?bool
    {
        return $this->abgeschlossen;
    }

    public function setAbgeschlossen(bool $abgeschlossen): static
    {
        $this->abgeschlossen = $abgeschlossen;

        return $this;
    }
}
