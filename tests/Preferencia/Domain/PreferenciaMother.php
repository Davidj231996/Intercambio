<?php

namespace App\Tests\Preferencia\Domain;

use App\Categoria\Domain\Categoria;
use App\Preferencia\Domain\Preferencia;
use App\Tests\Categoria\Domain\CategoriaMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;

class PreferenciaMother
{
    public static function create(
        ?int       $id = null,
        ?Usuario   $usuario = null,
        ?Categoria $categoria = null
    ): Preferencia
    {
        return new Preferencia(
            $id ?? IdMother::create(),
            $usuario ?? UsuarioMother::create(),
            $categoria ?? CategoriaMother::create()
        );
    }

    public static function new(
        ?Usuario   $usuario = null,
        ?Categoria $categoria = null
    ): Preferencia
    {
        return new Preferencia(
            null,
            $usuario ?? UsuarioMother::create(),
            $categoria ?? CategoriaMother::create()
        );
    }
}