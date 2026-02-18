<?php

namespace App\Entity;

use App\Contract\IdentifiableInterface;

final class Filiere implements IdentifiableInterface
{
    private ?int $id;
    private string $libelle;

    public function __construct(?int $id, string $libelle)
    {
        $this->setId($id);
        $this->setLibelle($libelle);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if ($id !== null && $id <= 0) {
            throw new \InvalidArgumentException("Id filière invalide.");
        }
        $this->id = $id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): void
    {
        $libelle = trim($libelle);
        if ($libelle === '') {
            throw new \InvalidArgumentException("Libellé obligatoire.");
        }
        $this->libelle = $libelle;
    }
}
