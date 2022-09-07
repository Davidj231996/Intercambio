<?php

namespace App\Tests\Favorito\Domain;

use App\Favorito\Domain\Favorito;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;
use DateTime;

class FavoritoMother
{
    public static function create(
        ?int      $id = null,
        ?Usuario  $usuario = null,
        ?Objeto   $objeto = null,
        ?DateTime $fecha = null
    ): Favorito
    {
        return new Favorito(
            $id ?? IdMother::create(),
            $usuario ?? UsuarioMother::create(),
            $objeto ?? ObjetoMother::create(),
            $fecha ?? DateTimeMother::create()
        );
    }

    public static function new(
        ?Usuario  $usuario = null,
        ?Objeto   $objeto = null,
        ?DateTime $fecha = null
    ): Favorito
    {
        return new Favorito(
            null,
            $usuario ?? UsuarioMother::create(),
            $objeto ?? ObjetoMother::create(),
            $fecha ?? DateTimeMother::create()
        );
    }
}