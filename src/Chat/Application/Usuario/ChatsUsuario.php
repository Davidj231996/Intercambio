<?php

namespace App\Chat\Application\Usuario;

use App\Chat\Domain\ChatRepository;
use App\Chat\Domain\Chats;
use App\Usuario\Domain\Usuario;

class ChatsUsuario
{
    public function __construct(private ChatRepository $chatRepository)
    {}

    public function searchByUsuario(Usuario $usuario): ?Chats
    {
        return $this->chatRepository->searchByUsuario($usuario);
    }
}