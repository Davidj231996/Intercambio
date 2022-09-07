<?php

namespace App\Chat\Domain;

use Doctrine\Common\Collections\Collection;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;

class Chat extends Root
{
    public const LEIDO = 1;
    public const NO_LEIDO = 0;

    private ?Collection $mensajes;

    public function __construct(
        private ?int     $id,
        private Usuario  $usuario1,
        private Usuario  $usuario2,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion,
        private int      $leidoUsuario1,
        private int      $leidoUsuario2
    )
    {
    }

    public static function create(?int $id, Usuario $usuario1, Usuario $usuario2, DateTime $fechaCreacion): Chat
    {
        return new self($id, $usuario1, $usuario2, $fechaCreacion, $fechaCreacion, self::LEIDO, self::NO_LEIDO);
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

    public function leidoUsuario1(): int
    {
        return $this->leidoUsuario1;
    }

    public function leidoUsuario2(): int
    {
        return $this->leidoUsuario2;
    }

    public function mensajes(): ?Collection
    {
        return $this->mensajes;
    }

    public function actualizar(DateTime $fecha): void
    {
        $this->fechaActualizacion = $fecha;
    }

    public function marcarLeidoUsuario1():void
    {
        $this->leidoUsuario1 = self::LEIDO;
    }

    public function marcarLeidoUsuario2():void
    {
        $this->leidoUsuario2 = self::LEIDO;
    }

    public function marcarNoLeidoUsuario1():void
    {
        $this->leidoUsuario1 = self::NO_LEIDO;
    }

    public function marcarNoLeidoUsuario2():void
    {
        $this->leidoUsuario2 = self::NO_LEIDO;
    }
}