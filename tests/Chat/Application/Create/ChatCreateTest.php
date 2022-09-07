<?php

namespace App\Tests\Chat\Application\Create;

use App\Tests\Chat\ChatModuleUnitCase;
use App\Tests\Chat\Domain\ChatMother;

class ChatCreateTest extends ChatModuleUnitCase
{
    /** @test */
    public function debe_crear_chat()
    {
        $chat = ChatMother::new();

        $this->shouldSave($chat);

        $this->repository()->save($chat);
    }
}