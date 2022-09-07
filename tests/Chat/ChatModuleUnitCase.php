<?php

declare(strict_types=1);

namespace App\Tests\Chat;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use App\Chat\Domain\Chats;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use App\Usuario\Domain\Usuario;
use Mockery\MockInterface;

abstract class ChatModuleUnitCase extends UnitTestCase
{
    private ChatRepository|MockInterface|null $repository;

    protected function shouldSave(Chat $chat): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($chat))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Chat $chat): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($chat);
    }

    protected function shouldSearchByUsuario(Usuario $usuario, ?Chats $chats): void
    {
        $this->repository()->shouldReceive('searchByUsuario')
            ->with($this->similarTo($usuario))
            ->once()->andReturn($chats);
    }

    protected function repository(): ChatRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ChatRepository::class);
    }
}