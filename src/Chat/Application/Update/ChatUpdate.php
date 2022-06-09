<?php

namespace App\Chat\Application\Update;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use DateTime;

class ChatUpdate
{
    public function __construct(private ChatRepository $chatRepository)
    {
    }

    public function update(Chat $chat): void
    {
        $chat->actualizar(new DateTime());
        $this->chatRepository->save($chat);
    }
}