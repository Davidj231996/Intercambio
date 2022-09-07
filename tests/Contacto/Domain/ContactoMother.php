<?php

namespace App\Tests\Contacto\Domain;

use App\Contacto\Domain\Contacto;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\EmailMother;
use App\Tests\Shared\Domain\EstadoContactoMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use DateTime;

class ContactoMother
{
    public static function create(
        ?int      $id = null,
        ?string   $email = null,
        ?string   $mensaje = null,
        ?DateTime $fecha = null,
        ?int      $estado = null
    ): Contacto
    {
        return new Contacto(
            $id ?? IdMother::create(),
            $email ?? EmailMother::create(),
            $mensaje ?? WordMother::create(),
            $fecha ?? DateTimeMother::create(),
            $estado ?? EstadoContactoMother::create()
        );
    }

    public static function new(
        ?string   $email = null,
        ?string   $mensaje = null,
        ?DateTime $fecha = null
    ): Contacto
    {
        return new Contacto(
            null,
            $email ?? WordMother::create(),
            $mensaje ?? WordMother::create(),
            $fecha ?? DateTimeMother::create(),
            Contacto::ESTADO_NO_CONTESTADO
        );
    }
}