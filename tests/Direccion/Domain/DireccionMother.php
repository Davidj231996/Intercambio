<?php

namespace App\Tests\Direccion\Domain;

use App\Direccion\Domain\Direccion;
use App\Tests\Shared\Domain\CiudadMother;
use App\Tests\Shared\Domain\CodigoPostalMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;

class DireccionMother
{
    public static function create(
        ?int     $id = null,
        ?string  $direccion = null,
        ?string  $ciudad = null,
        ?string  $provincia = null,
        ?string  $comunidadAutonoma = null,
        ?string  $codigoPostal = null,
        ?Usuario $usuario = null
    ): Direccion
    {
        return new Direccion(
            $id ?? IdMother::create(),
            $direccion ?? WordMother::create(),
            $ciudad ?? CiudadMother::create(),
            $provincia ?? CiudadMother::create(),
            $comunidadAutonoma ?? CiudadMother::create(),
            $codigoPostal ?? CodigoPostalMother::create(),
            $usuario ?? UsuarioMother::create()
        );
    }

    public static function new(
        ?string  $direccion = null,
        ?string  $ciudad = null,
        ?string  $provincia = null,
        ?string  $comunidadAutonoma = null,
        ?string  $codigoPostal = null,
        ?Usuario $usuario = null
    ): Direccion
    {
        return new Direccion(
            null,
            $direccion ?? WordMother::create(),
            $ciudad ?? CiudadMother::create(),
            $provincia ?? CiudadMother::create(),
            $comunidadAutonoma ?? CiudadMother::create(),
            $codigoPostal ?? CodigoPostalMother::create(),
            $usuario ?? UsuarioMother::create()
        );
    }
}