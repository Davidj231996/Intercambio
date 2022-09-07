<?php

namespace App\Tests\Chat\Application\Usuario;

use App\Chat\Application\Usuario\ChatsUsuario;
use App\Chat\Domain\Chats;
use App\Tests\Chat\ChatModuleUnitCase;
use App\Tests\Chat\Domain\ChatMother;

class ChatsUsuarioTest extends ChatModuleUnitCase
{
    private ChatsUsuario $chatsUsuario;

    protected function setUp(): void
    {
        parent::setUp();

        $this->chatsUsuario = new ChatsUsuario($this->repository());
    }

    /** @test */
    public function debe_devolver_chats_usuario()
    {
        $chat = ChatMother::create();
        $chats = new Chats([$chat]);

        $this->shouldSearchByUsuario($chat->usuario1(), $chats);

        $this->chatsUsuario->searchByUsuario($chat->usuario1());
    }
}