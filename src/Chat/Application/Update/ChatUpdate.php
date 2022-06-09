<?php

namespace App\Chat\Application\Update;

use App\Chat\Domain\ChatRepository;
use DateTime;

class ChatUpdate
{
    public function __construct(private ChatRepository $chatRepository)
    {
    }

    public function update(int $id): void
    {
        $chat = $this->chatRepository->search($id);
        $chat->actualizar(new DateTime());
        $this->chatRepository->save($chat);
    }
}