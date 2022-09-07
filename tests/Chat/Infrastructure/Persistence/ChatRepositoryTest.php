<?php

namespace App\Tests\Chat\Infrastructure\Persistence;

use App\Chat\Domain\Chats;
use App\Tests\Chat\ChatModuleInfraestructureTestCase;
use App\Tests\Chat\Domain\ChatMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class ChatRepositoryTest extends ChatModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_chat()
    {
        $chat = ChatMother::new();

        $this->repository()->save($chat);
    }

    /** @test */
    public function devuelve_chat_existente()
    {
        $chat = ChatMother::new();

        $this->repository()->save($chat);

        self::assertEquals($this->repository()->search($chat->id()), $chat);
    }

    /** @test */
    public function no_devuelve_chat()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_chats_usuario()
    {
        $usuario = UsuarioMother::create();
        $chat = ChatMother::new(usuario1: $usuario);
        $chats = new Chats([$chat]);

        $this->repository()->save($chat);

        self::assertEquals($this->repository()->searchByUsuario($usuario), $chats);
    }
}