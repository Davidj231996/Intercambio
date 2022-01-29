<?php

namespace App\Intercambio\Domain;

use App\Shared\Domain\Root\Root;
use DateTime;

class Intercambio extends Root
{
    public const ESTADO_PENDIENTE = 0;
    public const ESTADO_CANCELADO = -1;
    public const ESTADO_ENVIADO = 1;
    public const ESTADO_FINALIZADO = 2;

    public function __construct(
        private int      $id,
        private int      $objetoIntercambioId,
        private int      $objetoIntercambiarId,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion,
        private int      $estado
    )
    {
    }

    public static function create(int $id, int $objetoIntercambioId, int $objetoIntercambiarId, DateTime $fechaCreacion, DateTime $fechaActualizacion): Intercambio
    {
        return new self($id, $objetoIntercambioId, $objetoIntercambiarId, $fechaCreacion, $fechaActualizacion, self::ESTADO_PENDIENTE);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function objetoIntercambioId(): int
    {
        return $this->objetoIntercambioId;
    }

    public function objetoIntercambiarId(): int
    {
        return $this->objetoIntercambiarId;
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
            case self::ESTADO_CANCELADO:
                return 'Cancelado';
            case self::ESTADO_ENVIADO:
                return 'Enviado';
            case self::ESTADO_FINALIZADO:
                return 'Finalizado';
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