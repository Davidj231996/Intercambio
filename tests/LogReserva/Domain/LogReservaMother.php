<?php

namespace App\Tests\LogReserva\Domain;

use App\LogReserva\Domain\LogReserva;
use App\Reserva\Domain\Reserva;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\EstadoLogReservaMother;
use App\Tests\Shared\Domain\IdMother;
use DateTime;

class LogReservaMother
{
    public static function create(
        ?int      $id = null,
        ?Reserva  $reserva = null,
        ?DateTime $fecha = null,
        ?int      $estado = null
    ): LogReserva
    {
        return new LogReserva(
            $id ?? IdMother::create(),
            $reserva ?? ReservaMother::create(),
            $fecha ?? DateTimeMother::create(),
            $estado ?? EstadoLogReservaMother::create()
        );
    }

    public static function new(
        ?Reserva  $reserva = null,
        ?DateTime $fecha = null,
        ?int      $tipo = null
    ): LogReserva
    {
        return new LogReserva(
            null,
            $reserva ?? ReservaMother::create(),
            $fecha ?? DateTimeMother::create(),
            $tipo ?? EstadoLogReservaMother::create()
        );
    }
}