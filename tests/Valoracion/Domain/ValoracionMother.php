<?php

namespace App\Tests\Valoracion\Domain;

use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\ValorMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;
use App\Valoracion\Domain\Valoracion;

class ValoracionMother
{
    public static function create(
        ?int     $id = null,
        ?Usuario $usuario = null,
        ?float   $valor = null,
        ?int     $totales = null
    ): Valoracion
    {
        return new Valoracion(
            $id ?? IdMother::create(),
            $usuario ?? UsuarioMother::create(),
            $valor ?? ValorMother::create(),
            $totales ?? IdMother::create()
        );
    }

    public static function new(
        ?Usuario $usuario = null,
        ?float   $valor = null
    ): Valoracion
    {
        return new Valoracion(
            null,
            $usuario ?? UsuarioMother::create(),
            $valor ?? ValorMother::create(),
            1
        );
    }
}