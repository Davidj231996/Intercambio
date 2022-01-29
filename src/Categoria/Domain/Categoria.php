<?php

namespace App\Categoria\Domain;

use App\Shared\Domain\Root\Root;

class Categoria extends Root
{
    public function __construct(
        private int $id,
        private string $nombre,
        private string $descripcion,
        private ?int $categoriaId
    )
    {}

    public function id(): int
    {
        return $this->id;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function descripcion(): string
    {
        return $this->descripcion;
    }

    public function categoriaId(): int
    {
        return $this->categoriaId;
    }
}