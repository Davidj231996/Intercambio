<?php

namespace App\Tests\Chat\Application\ChatLeido;

use App\Chat\Application\ChatLeido\ChatLeido;
use App\Chat\Domain\Chat;
use App\Tests\Chat\ChatModuleUnitCase;
use App\Tests\Chat\Domain\ChatMother;

class ChatLeidoTest extends ChatModuleUnitCase
{
    private ChatLeido $chatLeido;

    protected function setUp(): void
    {
        parent::setUp();

        $this->chatLeido = new ChatLeido($this->repository());
    }

    /** @test */
    public function debe_marcar_chat_leido()
    {
        $chat = ChatMother::create(estado1: Chat::NO_LEIDO);

        $this->shouldSave($chat);

        $this->chatLeido->marcarLeido($chat->usuario1(), $chat);

        self::assertTrue((bool)$chat->leidoUsuario1());
    }
}