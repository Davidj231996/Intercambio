<?php

namespace App\Reserva\Domain;

use App\Shared\Domain\Root\Root;
use DateTime;

class Reserva extends Root
{
    public const ESTADO_PENDIENTE = 0;
    public const ESTADO_CANCELADO = -1;
    public const ESTADO_ACEPTADO = 1;

    public function __construct(
        private int $id,
        private int $usuarioId,
        private int $objetoId,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion,
        private int $estado
    )
    {}

    public static function create(int $id, int $usuarioId, int $objetoId, DateTime $fechaCreacion, DateTime $fechaActualizacion): Reserva
    {
        return new self($id, $usuarioId, $objetoId, $fechaCreacion, $fechaActualizacion, self::ESTADO_PENDIENTE);
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

    public function fechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    public function fechaActualizacion(): DateTime
    {
        return $this->fechaActualizacion;
    }

    public function estado(): int
    {
        return $this->estado;
    }

    public function estadoToString(): string
    {
        switch ($this->estado) {
            case self::ESTADO_ACEPTADO:
                return 'Aceptado';
            case self::ESTADO_CANCELADO:
                return 'Cancelado';
            default:
                return 'Pendiente';
        }
    }

    public function update(int $estado, DateTime $fechaActualizacion)
    {
        $this->estado = $estado;
        $this->fechaActualizacion = $fechaActualizacion;
    }
}