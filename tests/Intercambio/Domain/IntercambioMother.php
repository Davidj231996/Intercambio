<?php

namespace App\Tests\Intercambio\Domain;

use App\Intercambio\Domain\Intercambio;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;
use DateTime;

class IntercambioMother
{
    public static function create(
        ?int      $id = null,
        ?Objeto   $objeto1 = null,
        ?Objeto   $objeto2 = null,
        ?Usuario  $usuario1 = null,
        ?Usuario  $usuario2 = null,
        ?DateTime $fechaCreacion = null,
        ?DateTime $fechaActualizacion = null
    ): Intercambio
    {
        return new Intercambio(
            $id ?? IdMother::create(),
            $objeto1 ?? ObjetoMother::create(),
            $objeto2 ?? ObjetoMother::create(),
            $usuario1 ?? UsuarioMother::create(),
            $usuario2 ?? UsuarioMother::create(),
            $fechaCreacion ?? DateTimeMother::create(),
            $fechaActualizacion ?? DateTimeMother::create(),
            Intercambio::ESTADO_PENDIENTE,
            Intercambio::ESTADO_PENDIENTE
        );
    }

    public static function new(
        ?Objeto   $objeto1 = null,
        ?Objeto   $objeto2 = null,
        ?Usuario  $usuario1 = null,
        ?Usuario  $usuario2 = null,
        ?DateTime $fechaCreacion = null,
        ?DateTime $fechaActualizacion = null
    ): Intercambio
    {
        return new Intercambio(
            null,
            $objeto1 ?? ObjetoMother::create(),
            $objeto2 ?? ObjetoMother::create(),
            $usuario1 ?? UsuarioMother::create(),
            $usuario2 ?? UsuarioMother::create(),
            $fechaCreacion ?? DateTimeMother::create(),
            $fechaActualizacion ?? DateTimeMother::create(),
            Intercambio::ESTADO_PENDIENTE,
            Intercambio::ESTADO_PENDIENTE
        );
    }
}