<?php

namespace App\Favorito\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;

class Favorito extends Root
{
    public function __construct(
        private ?int      $id,
        private Usuario  $usuario,
        private Objeto   $objeto,
        private DateTime $fecha
    )
    {
    }

    public static function create(?int $id, Usuario $usuario, Objeto $objeto, DateTime $fecha): Favorito
    {
        return new self($id, $usuario, $objeto, $fecha);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function usuario(): Usuario
    {
        return $this->usuario;
    }

    public function objeto(): Objeto
    {
        return $this->objeto;
    }

    public function fecha(): DateTime
    {
        return $this->fecha;
    }
}