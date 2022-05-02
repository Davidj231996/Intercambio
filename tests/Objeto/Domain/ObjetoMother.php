<?php

namespace App\Tests\Objeto\Domain;

use App\Objeto\Domain\Objeto;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;

class ObjetoMother
{
    public static function create(?int $id = null, ?string $nombre = null, ?string $descripcion = null, ?int $estado = null, ?Usuario $usuario = null)
    {
        return new Objeto(
            $id ?? IdMother::create(),
            $nombre ?? WordMother::create(),
            $descripcion ?? WordMother::create(),
            $estado ?? IdMother::create(),
            $usuario ?? UsuarioMother::create()
        );
    }

    public static function new(?string $nombre = null, ?string $descripcion = null, ?int $estado = null, ?Usuario $usuario = null)
    {
        return new Objeto(
            null,
            $nombre ?? WordMother::create(),
            $descripcion ?? WordMother::create(),
            0,
            $usuario ?? UsuarioMother::create()
        );
    }
}