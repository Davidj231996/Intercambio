<?php

declare(strict_types=1);

namespace App\Objeto\Domain;

use App\Shared\Domain\Root\Root;

class Objeto extends Root
{
    public function __construct(
        private int $id,
        private string $nombre,
        private string $descripcion,
        private int $estado,
        private int $usuarioId
    )
    {
    }

    public static function create(
        int $id, string $nombre, string $descripcion, int $estado, int $usuarioId
    ) : Objeto
    {
        return new self($id, $nombre, $descripcion, $estado, $usuarioId);
    }

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

    public function estado(): int
    {
        return $this->estado;
    }

    public function usuarioId(): int
    {
        return $this->usuarioId;
    }

    public function update(
        string $nombre, string $descripcion, int $estado, int $usuarioId
    )
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->usuarioId = $usuarioId;
    }
}