<?php

namespace App\Tests\Usuario\Domain;

use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use App\Usuario\Domain\Usuario;

class UsuarioMother
{
    public static function create(
        ?int    $id = null,
        ?string $alias = null,
        ?string $nombre = null,
        ?string $apellidos = null,
        ?string $telefono = null,
        ?string $email = null,
        ?string $password = null
    ): Usuario
    {
        return new Usuario(
            $id ?? IdMother::create(),
            $alias ?? WordMother::create(),
            $nombre ?? WordMother::create(),
            $apellidos ?? WordMother::create(),
            $telefono ?? WordMother::create(),
            $email ?? WordMother::create(),
            $password ?? WordMother::create()
        );
    }

    public static function new(
        ?string $alias = null,
        ?string $nombre = null,
        ?string $apellidos = null,
        ?string $telefono = null,
        ?string $email = null,
        ?string $password = null
    ): Usuario
    {
        return new Usuario(
            null,
            $alias ?? WordMother::create(),
            $nombre ?? WordMother::create(),
            $apellidos ?? WordMother::create(),
            $telefono ?? WordMother::create(),
            $email ?? WordMother::create(),
            $password ?? WordMother::create()
        );
    }
}