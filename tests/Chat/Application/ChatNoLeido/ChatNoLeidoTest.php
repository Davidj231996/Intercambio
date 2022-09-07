<?php

namespace App\Tests\Chat\Application\ChatNoLeido;

use App\Chat\Application\ChatNoLeido\ChatNoLeido;
use App\Tests\Chat\ChatModuleUnitCase;
use App\Tests\Chat\Domain\ChatMother;

class ChatNoLeidoTest extends ChatModuleUnitCase
{
    private ChatNoLeido $chatNoLeido;

    protected function setUp(): void
    {
        parent::setUp();

        $this->chatNoLeido = new ChatNoLeido($this->repository());
    }

    /** @test */
    public function debe_marcar_chat_no_leido()
    {
        $chat = ChatMother::new();

        $this->shouldSave($chat);

        $this->chatNoLeido->marcarNoLeido($chat->usuario1(), $chat);

        self::assertFalse((bool)$chat->leidoUsuario1());
    }
}