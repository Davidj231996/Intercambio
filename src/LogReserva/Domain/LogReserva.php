<?php

namespace App\LogReserva\Domain;

use App\Objeto\Domain\Objeto;
use App\Reserva\Domain\Reserva;
use App\Shared\Domain\Root\Root;
use DateTime;

class LogReserva extends Root
{
    public const TIPO_CREAR = 1;
    public const TIPO_ACEPTAR = 2;
    public const TIPO_CANCELAR = 3;
    public const TIPO_ELIMINAR = 4;

    public function __construct(
        private ?int     $id,
        private Reserva  $reserva,
        private DateTime $fecha,
        private int      $tipo
    ) {}

    public static function create(?int $id, Reserva $reserva, DateTime $fecha, int $tipo) {
        return new self($id, $reserva, $fecha, $tipo);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function reserva(): Reserva
    {
        return $this->reserva;
    }

    public function fecha(): DateTime
    {
        return $this->fecha;
    }

    public function tipo(): int
    {
        return $this->tipo;
    }
}