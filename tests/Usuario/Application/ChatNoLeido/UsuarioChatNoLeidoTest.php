<?php

namespace App\Tests\Usuario\Application\ChatNoLeido;

use App\Chat\Domain\Chat;
use App\Tests\Chat\Domain\ChatMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\ChatNoLeido\UsuarioChatNoLeido;

class UsuarioChatNoLeidoTest extends UsuarioModuleUnitCase
{

    private UsuarioChatNoLeido $chatNoLeido;

    public function setUp(): void
    {
        parent::setUp();

        $this->chatNoLeido = new UsuarioChatNoLeido($this->repository());
    }

    /** @test */
    public function debe_marcar_chat_no_leido()
    {
        $usuario = UsuarioMother::new();
        $chat = ChatMother::create(usuario1: $usuario, estado1: Chat::LEIDO);

        $this->shouldSave($usuario);

        $this->chatNoLeido->marcarNoLeido($usuario, $chat);

        self::assertEquals($usuario->chatsSinLeer(), 1);
    }
}