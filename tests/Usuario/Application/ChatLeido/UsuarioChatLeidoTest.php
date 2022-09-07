<?php

namespace App\Tests\Usuario\Application\ChatLeido;

use App\Chat\Domain\Chat;
use App\Tests\Chat\Domain\ChatMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\ChatLeido\UsuarioChatLeido;

class UsuarioChatLeidoTest extends UsuarioModuleUnitCase
{

    private UsuarioChatLeido $chatLeido;

    public function setUp(): void
    {
        parent::setUp();

        $this->chatLeido = new UsuarioChatLeido($this->repository());
    }

    /** @test */
    public function debe_marcar_chat_leido()
    {
        $usuario = UsuarioMother::new();
        $chat = ChatMother::create(usuario1: $usuario, estado1: Chat::NO_LEIDO);

        $usuario->updateNoLeido();

        $this->shouldSave($usuario);

        $this->chatLeido->marcarLeido($usuario, $chat);

        self::assertEquals($usuario->chatsSinLeer(), 0);
    }
}