<?php

namespace App\Tests\Reserva\Domain;

use App\Objeto\Domain\Objeto;
use App\Reserva\Domain\Reserva;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\EstadoReservaMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;
use DateTime;

class ReservaMother
{
    public static function create(
        ?int      $id = null,
        ?Usuario  $usuario = null,
        ?Objeto   $objeto = null,
        ?Usuario  $usuarioObjeto = null,
        ?DateTime $fechaCreacion = null,
        ?DateTime $fechaActualizacion = null,
        ?int      $estado = null
    ): Reserva
    {
        return new Reserva(
            $id ?? IdMother::create(),
            $usuario ?? UsuarioMother::create(),
            $objeto ?? ObjetoMother::create(),
            $usuarioObjeto ?? UsuarioMother::create(),
            $fechaCreacion ?? DateTimeMother::create(),
            $fechaActualizacion ?? DateTimeMother::create(),
            $estado ?? EstadoReservaMother::create()
        );
    }

    public static function new(
        ?Usuario  $usuario = null,
        ?Objeto   $objeto = null,
        ?Usuario  $usuarioObjeto = null,
        ?DateTime $fechaCreacion = null,
        ?DateTime $fechaActualizacion = null
    ): Reserva
    {
        return new Reserva(
            null,
            $usuario ?? UsuarioMother::create(),
            $objeto ?? ObjetoMother::create(),
            $usuarioObjeto ?? UsuarioMother::create(),
            $fechaCreacion ?? DateTimeMother::create(),
            $fechaActualizacion ?? DateTimeMother::create(),
            Reserva::ESTADO_PENDIENTE
        );
    }
}