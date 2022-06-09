<?php

namespace App\Chat\Domain;

class ChatFinder
{
    public function __construct(private ChatRepository $repository)
    {
    }

    public function __invoke(int $id): Chat
    {
        $chat = $this->repository->search($id);

        if ($chat === null) {
            throw new ChatNotFound($id);
        }

        return $chat;
    }
}