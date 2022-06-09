<?php

namespace App\Chat\Domain;

use App\Shared\Domain\Collection;

final class Chats extends Collection
{
    protected function type(): string
    {
        return Chat::class;
    }
}