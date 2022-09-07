<?php

namespace App\Tests\LogObjeto\Domain;

use App\LogObjeto\Domain\LogObjeto;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\EstadoLogObjetoMother;
use App\Tests\Shared\Domain\IdMother;
use DateTime;

class LogObjetoMother
{
    public static function create(
        ?int      $id = null,
        ?Objeto   $objeto = null,
        ?DateTime $fecha = null,
        ?int      $estado = null
    ): LogObjeto
    {
        return new LogObjeto(
            $id ?? IdMother::create(),
            $objeto ?? ObjetoMother::create(),
            $fecha ?? DateTimeMother::create(),
            $estado ?? EstadoLogObjetoMother::create()
        );
    }

    public static function new(
        ?Objeto   $objeto = null,
        ?DateTime $fecha = null,
        ?int      $estado = null
    ): LogObjeto
    {
        return new LogObjeto(
            null,
            $objeto ?? ObjetoMother::create(),
            $fecha ?? DateTimeMother::create(),
            $estado ?? EstadoLogObjetoMother::create()
        );
    }
}