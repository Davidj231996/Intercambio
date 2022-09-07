<?php

namespace App\Tests\Chat;

use App\Chat\Domain\ChatRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class ChatModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ChatRepository
    {
        return $this->service(ChatRepository::class);
    }
}