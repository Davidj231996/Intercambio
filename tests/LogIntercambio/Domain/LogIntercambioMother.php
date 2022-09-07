<?php

namespace App\Tests\LogIntercambio\Domain;

use App\Intercambio\Domain\Intercambio;
use App\LogIntercambio\Domain\LogIntercambio;
use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\EstadoLogIntercambioMother;
use App\Tests\Shared\Domain\IdMother;
use DateTime;

class LogIntercambioMother
{
    public static function create(
        ?int         $id = null,
        ?Intercambio $intercambio = null,
        ?DateTime    $fecha = null,
        ?int         $estado = null
    ): LogIntercambio
    {
        return new LogIntercambio(
            $id ?? IdMother::create(),
            $intercambio ?? IntercambioMother::create(),
            $fecha ?? DateTimeMother::create(),
            $estado ?? EstadoLogIntercambioMother::create()
        );
    }

    public static function new(
        ?Intercambio $intercambio = null,
        ?DateTime    $fecha = null,
        ?int         $estado = null
    ): LogIntercambio
    {
        return new LogIntercambio(
            null,
            $intercambio ?? IntercambioMother::create(),
            $fecha ?? DateTimeMother::create(),
            $estado ?? EstadoLogIntercambioMother::create()
        );
    }
}