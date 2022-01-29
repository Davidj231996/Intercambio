<?php

namespace App\Preferencia\Domain;

use App\Shared\Domain\Root\Root;

class Preferencia extends Root
{
    public function __construct(
        private int $id,
        private int $usuarioId,
        private int $categoriaId
    )
    {
    }

    public static function create(int $id, int $usuarioId, int $categoriaId): Preferencia
    {
        return new self($id, $usuarioId, $categoriaId);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function usuarioId(): int
    {
        return $this->usuarioId;
    }

    public function categoriaId(): int
    {
        return $this->categoriaId;
    }
}