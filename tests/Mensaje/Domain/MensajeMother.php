<?php

namespace App\Tests\Mensaje\Domain;

use App\Chat\Domain\Chat;
use App\Mensaje\Domain\Mensaje;
use App\Tests\Chat\Domain\ChatMother;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;
use DateTime;

class MensajeMother
{
    public static function create(
        ?int      $id = null,
        ?Chat     $chat = null,
        ?Usuario  $usuario = null,
        ?string   $mensaje = null,
        ?DateTime $fecha = null
    ): Mensaje
    {
        return new Mensaje(
            $id ?? IdMother::create(),
            $chat ?? ChatMother::create(),
            $usuario ?? UsuarioMother::create(),
            $mensaje ?? WordMother::create(),
            $fecha ?? DateTimeMother::create()
        );
    }

    public static function new(
        ?Chat     $chat = null,
        ?Usuario  $usuario = null,
        ?string   $mensaje = null,
        ?DateTime $fecha = null
    ): Mensaje
    {
        return new Mensaje(
            null,
            $chat ?? ChatMother::create(),
            $usuario ?? UsuarioMother::create(),
            $mensaje ?? WordMother::create(),
            $fecha ?? DateTimeMother::create()
        );
    }
}