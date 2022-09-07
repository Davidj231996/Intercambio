<?php

namespace App\Contacto\Domain;

use App\Shared\Domain\Root\Root;
use DateTime;

class Contacto extends Root
{
    public const ESTADO_CONTESTADO = 1;
    public const ESTADO_NO_CONTESTADO = -1;

    public function __construct(
        private ?int     $id,
        private string   $email,
        private string   $mensaje,
        private DateTime $fecha,
        private int      $estado
    )
    {
    }

    public static function create(?int $id, string $email, string $mensaje, DateTime $fecha)
    {
        return new self($id, $email, $mensaje, $fecha, self::ESTADO_NO_CONTESTADO);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function mensaje(): string
    {
        return $this->mensaje;
    }

    public function fecha(): DateTime
    {
        return $this->fecha;
    }

    public function estado(): int
    {
        return $this->estado;
    }

    public function responder(): void
    {
        $this->estado = self::ESTADO_CONTESTADO;
    }
}