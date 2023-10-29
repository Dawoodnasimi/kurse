<?php

namespace App\Entity;

use App\Repository\KurseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: KurseRepository::class)]
class Kurse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #@Assert\NotBlank
    #@Assert\Length(min: 3, max: 255)
    private ?string $name = null;

    #[ORM\Column]
    private ?int $dauer = null;

    #[ORM\Column(length: 255)]
    private ?string $info = null;

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

    public function getDauer(): ?int
    {
        return $this->dauer;
    }

    public function setDauer(int $dauer): static
    {
        $this->dauer = $dauer;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): static
    {
        $this->info = $info;

        return $this;
    }
}
