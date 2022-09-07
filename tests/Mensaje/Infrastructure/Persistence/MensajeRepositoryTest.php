<?php

namespace App\Tests\Mensaje\Infrastructure\Persistence;

use App\Mensaje\Domain\Mensajes;
use App\Tests\Chat\Domain\ChatMother;
use App\Tests\Mensaje\Domain\MensajeMother;
use App\Tests\Mensaje\MensajeModuleInfraestructureTestCase;
use App\Tests\Shared\Domain\IdMother;

class MensajeRepositoryTest extends MensajeModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_preferencia()
    {
        $mensaje = MensajeMother::new();

        $this->repository()->save($mensaje);
    }

    /** @test */
    public function devuelve_mensaje_existente()
    {
        $mensaje = MensajeMother::new();

        $this->repository()->save($mensaje);

        $this->assertEquals($this->repository()->search($mensaje->id()), $mensaje);
    }

    /** @test */
    public function devuelve_un_mensaje_que_no_existe(): void
    {
        $this->assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_mensajes_chat()
    {
        $chat = ChatMother::create();
        $mensaje = MensajeMother::new(chat: $chat);
        $mensajes = new Mensajes([$mensaje]);

        $this->repository()->save($mensaje);

        self::assertEquals($this->repository()->searchByChat($chat), $mensajes);
    }
}