<?php

namespace App\Chat\Application\ChatNoLeido;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use App\Usuario\Domain\Usuario;

class ChatNoLeido
{
    public function __construct(private ChatRepository $chatRepository)
    {
    }

    public function marcarNoLeido(Usuario $usuario, Chat $chat): void
    {
        if ($usuario == $chat->usuario1()) {
            $chat->marcarNoLeidoUsuario1();
        } else {
            $chat->marcarNoLeidoUsuario2();
        }
        $this->chatRepository->save($chat);
    }
}