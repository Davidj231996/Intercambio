<?php

namespace App\LogObjeto\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;
use DateTime;

class LogObjeto extends Root
{
    public const TIPO_CREAR = 1;
    public const TIPO_EDITAR = 2;
    public const TIPO_ELIMINAR = 3;
    public const TIPO_HABILITAR = 4;
    public const TIPO_DESHABILITAR = 5;

    public function __construct(
        private ?int $id,
        private Objeto $objeto,
        private DateTime $fecha,
        private int $tipo
    ) {}

    public static function create(?int $id, Objeto $objeto, DateTime $fecha, int $tipo) {
        return new self($id, $objeto, $fecha, $tipo);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function objeto(): Objeto
    {
        return $this->objeto;
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