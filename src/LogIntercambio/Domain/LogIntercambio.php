<?php

namespace App\LogIntercambio\Domain;

use App\Intercambio\Domain\Intercambio;
use App\Shared\Domain\Root\Root;
use DateTime;

class LogIntercambio extends Root
{
    public const TIPO_CREACION = 1;
    public const TIPO_ACEPTAR = 2;
    public const TIPO_CANCELAR = 3;
    public const TIPO_ENVIAR = 4;
    public const TIPO_FINALIZAR = 5;

    public function __construct(
        private ?int        $id,
        private Intercambio $intercambio,
        private DateTime    $fecha,
        private int         $tipo
    ) {}

    public static function create(?int $id, Intercambio $intercambio, DateTime $fecha, int $tipo) {
        return new self($id, $intercambio, $fecha, $tipo);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function intercambio(): Intercambio
    {
        return $this->intercambio;
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