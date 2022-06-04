<?php

namespace App\Intercambio\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;

class Intercambio extends Root
{
    public const ESTADO_PENDIENTE = 0;
    public const ESTADO_CANCELADO = -1;
    public const ESTADO_ACEPTADO = -1;
    public const ESTADO_ENVIADO = 2;
    public const ESTADO_FINALIZADO = 3;

    public function __construct(
        private ?int     $id,
        private Objeto   $objetoIntercambio,
        private Objeto   $objetoIntercambiar,
        private Usuario  $usuarioIntercambio,
        private Usuario  $usuarioIntercambiar,
        private DateTime $fechaCreacion,
        private DateTime $fechaActualizacion,
        private int      $estadoIntercambio,
        private int      $estadoIntercambiar
    )
    {
    }

    public static function create(?int $id, Objeto $objetoIntercambio, Objeto $objetoIntercambiar, Usuario $usuarioIntercambio, Usuario $usuarioIntercambiar, DateTime $fechaCreacion, DateTime $fechaActualizacion): Intercambio
    {
        return new self($id, $objetoIntercambio, $objetoIntercambiar, $usuarioIntercambio, $usuarioIntercambiar, $fechaCreacion, $fechaActualizacion, self::ESTADO_PENDIENTE, self::ESTADO_PENDIENTE);
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

    public function usuarioIntercambio(): Usuario
    {
        return $this->usuarioIntercambio;
    }

    public function usuarioIntercambiar(): Usuario
    {
        return $this->usuarioIntercambiar;
    }

    public function fechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    public function fechaActualizacion(): DateTime
    {
        return $this->fechaActualizacion;
    }

    public function estadoIntercambio(): int
    {
        return $this->estadoIntercambio;
    }

    public function estadoIntercambioToString(): string
    {
        return match ($this->estadoIntercambio) {
            self::ESTADO_CANCELADO => 'Cancelado',
            self::ESTADO_ACEPTADO => 'Aceptado',
            self::ESTADO_ENVIADO => 'Enviado',
            self::ESTADO_FINALIZADO => 'Finalizado',
            default => 'Pendiente',
        };
    }

    public function estadoIntercambioClase(): string
    {
        switch ($this->estadoIntercambio) {
            case self::ESTADO_ENVIADO:
                return 'text-info';
            case self::ESTADO_CANCELADO:
                return 'text-danger';
            case self::ESTADO_FINALIZADO:
            case self::ESTADO_ACEPTADO:
                return 'text-success';
            default:
                return '';
        }
    }

    public function updateIntercambio(int $estado, DateTime $fechaActualizacion)
    {
        $this->estadoIntercambio = $estado;
        $this->fechaActualizacion = $fechaActualizacion;
    }

    public function estadoIntercambiar(): int
    {
        return $this->estadoIntercambiar;
    }

    public function estadoIntercambiarToString(): string
    {
        return match ($this->estadoIntercambiar) {
            self::ESTADO_CANCELADO => 'Cancelado',
            self::ESTADO_ACEPTADO => 'Aceptado',
            self::ESTADO_ENVIADO => 'Enviado',
            self::ESTADO_FINALIZADO => 'Finalizado',
            default => 'Pendiente',
        };
    }

    public function estadoIntercambiarClase(): string
    {
        switch ($this->estadoIntercambiar) {
            case self::ESTADO_ENVIADO:
                return 'text-info';
            case self::ESTADO_CANCELADO:
                return 'text-danger';
            case self::ESTADO_FINALIZADO:
            case self::ESTADO_ACEPTADO:
                return 'text-success';
            default:
                return '';
        }
    }

    public function updateIntercambiar(int $estado, DateTime $fechaActualizacion)
    {
        $this->estadoIntercambiar = $estado;
        $this->fechaActualizacion = $fechaActualizacion;
    }
}