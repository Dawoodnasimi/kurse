<?php

namespace App\Entity;

use App\Repository\KundenRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KundenRepository::class)]
class Kunden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $anschrift = null;

    #[ORM\Column(length: 255)]
    private ?string $kurs = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $begin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $ende = null;

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

    public function getAnschrift(): ?string
    {
        return $this->anschrift;
    }

    public function setAnschrift(string $anschrift): static
    {
        $this->anschrift = $anschrift;

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

    public function getBegin(): ?\DateTimeInterface
    {
        return $this->begin;
    }

    public function setBegin(\DateTimeInterface $begin): static
    {
        $this->begin = $begin;

        return $this;
    }

    public function getEnde(): ?\DateTimeInterface
    {
        return $this->ende;
    }

    public function setEnde(\DateTimeInterface $ende): static
    {
        $this->ende = $ende;

        return $this;
    }
}
