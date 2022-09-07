<?php

namespace App\Tests\Chat\Application\Update;

use App\Chat\Application\Update\ChatUpdate;
use App\Tests\Chat\ChatModuleUnitCase;
use App\Tests\Chat\Domain\ChatMother;

class ChatUpdateTest extends ChatModuleUnitCase
{
    private ChatUpdate $update;

    protected function setUp(): void
    {
        parent::setUp();

        $this->update = new ChatUpdate($this->repository());
    }

    /** @test */
    public function debe_actualizar_chat()
    {
        $chat = ChatMother::new();

        $this->shouldSave($chat);

        $this->update->update($chat);
    }
}