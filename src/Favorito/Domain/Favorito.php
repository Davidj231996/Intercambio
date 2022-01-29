<?php

namespace App\Favorito\Domain;

use App\Shared\Domain\Root\Root;
use DateTime;

class Favorito extends Root
{
    public function __construct(
        private int      $id,
        private int      $usuarioId,
        private int      $objetoId,
        private DateTime $fecha
    )
    {
    }

    public static function create(int $id, int $usuarioId, int $objetoId, DateTime $fecha): Favorito
    {
        return new self($id, $usuarioId, $objetoId, $fecha);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function usuarioId(): int
    {
        return $this->usuarioId;
    }

    public function objetoId(): int
    {
        return $this->objetoId;
    }

    public function fecha(): DateTime
    {
        return $this->fecha;
    }
}