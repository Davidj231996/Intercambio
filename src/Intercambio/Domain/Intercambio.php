<?php

namespace App\Intercambio\Domain;

use App\Objeto\Domain\Objeto;
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
        private Objeto      $objetoIntercambio,
        private Objeto      $objetoIntercambiar,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion,
        private int      $estado
    )
    {
    }

    public static function create(int $id, Objeto $objetoIntercambio, Objeto $objetoIntercambiar, DateTime $fechaCreacion, DateTime $fechaActualizacion): Intercambio
    {
        return new self($id, $objetoIntercambio, $objetoIntercambiar, $fechaCreacion, $fechaActualizacion, self::ESTADO_PENDIENTE);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function objetoIntercambio(): Objeto
    {
        return $this->objetoIntercambio;
    }

    public function objetoIntercambiar(): Objeto
    {
        return $this->objetoIntercambiar;
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
        return match ($this->estado) {
            self::ESTADO_CANCELADO => 'Cancelado',
            self::ESTADO_ENVIADO => 'Enviado',
            self::ESTADO_FINALIZADO => 'Finalizado',
            default => 'Pendiente',
        };
    }

    public function update(int $estado, DateTime $fechaActualizacion)
    {
        $this->estado = $estado;
        $this->fechaActualizacion = $fechaActualizacion;
    }
}