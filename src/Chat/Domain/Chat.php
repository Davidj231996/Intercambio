<?php

namespace App\Chat\Domain;

use Doctrine\Common\Collections\Collection;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;

class Chat extends Root
{
    private ?Collection $mensajes;

    public function __construct(
        private ?int $id,
        private Usuario $usuario1,
        private Usuario $usuario2,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion
    ) {}

    public function create(?int $id, Usuario $usuario1, Usuario $usuario2, DateTime $fechaCreacion): Chat
    {
        return new self($id, $usuario1, $usuario2, $fechaCreacion, $fechaCreacion);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function usuario1(): Usuario
    {
        return $this->usuario1;
    }

    public function usuario2(): Usuario
    {
        return $this->usuario2;
    }

    public function fechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    public function fechaActualizacion(): DateTime
    {
        return $this->fechaActualizacion;
    }

    public function mensajes(): ?Collection
    {
        return $this->mensajes;
    }

    public function actualizar(DateTime $fecha): void
    {
        $this->fechaActualizacion = $fecha;
    }
}