<?php

namespace App\Tests\Chat\Domain;

use App\Chat\Domain\Chat;
use App\Tests\Shared\Domain\DateTimeMother;
use App\Tests\Shared\Domain\EstadoChatMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;
use DateTime;

class ChatMother
{
    public static function create(
        ?int      $id = null,
        ?Usuario  $usuario1 = null,
        ?Usuario  $usuario2 = null,
        ?DateTime $fechaCreacion = null,
        ?DateTime $fechaActualizacion = null,
        ?int      $estado1 = null,
        ?int      $estado2 = null
    ): Chat
    {
        return new Chat(
            $id ?? IdMother::create(),
            $usuario1 ?? UsuarioMother::create(),
            $usuario2 ?? UsuarioMother::create(),
            $fechaCreacion ?? DateTimeMother::create(),
            $fechaActualizacion ?? DateTimeMother::create(),
            $estado1 ?? EstadoChatMother::create(),
            $estado2 ?? EstadoChatMother::create()
        );
    }

    public static function new(
        ?Usuario  $usuario1 = null,
        ?Usuario  $usuario2 = null,
        ?DateTime $fechaCreacion = null,
        ?DateTime $fechaActualizacion = null
    ): Chat
    {
        return new Chat(
            null,
            $usuario1 ?? UsuarioMother::create(),
            $usuario2 ?? UsuarioMother::create(),
            $fechaCreacion ?? DateTimeMother::create(),
            $fechaActualizacion ?? DateTimeMother::create(),
            Chat::LEIDO,
            Chat::LEIDO
        );
    }
}