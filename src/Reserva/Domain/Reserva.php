<?php

namespace App\Reserva\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;

class Reserva extends Root
{
    public const ESTADO_PENDIENTE = 0;
    public const ESTADO_CANCELADO = -1;
    public const ESTADO_ACEPTADO = 1;

    public function __construct(
        private ?int $id,
        private Usuario $usuario,
        private Objeto $objeto,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion,
        private int $estado
    )
    {}

    public static function create(?int $id, Usuario $usuario, Objeto $objeto, DateTime $fechaCreacion, DateTime $fechaActualizacion): Reserva
    {
        return new self($id, $usuario, $objeto, $fechaCreacion, $fechaActualizacion, self::ESTADO_PENDIENTE);
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