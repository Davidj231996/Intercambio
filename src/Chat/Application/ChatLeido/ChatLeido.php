<?php

namespace App\Chat\Application\ChatLeido;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use App\Usuario\Domain\Usuario;

class ChatLeido
{
    public function __construct(private ChatRepository $chatRepository)
    {
    }

    public function marcarLeido(Usuario $usuario, Chat $chat): void
    {
        if ($usuario == $chat->usuario1() && !$chat->leidoUsuario1()) {
            $chat->marcarLeidoUsuario1();
        } elseif ($usuario == $chat->usuario2() && !$chat->leidoUsuario2()) {
            $chat->marcarLeidoUsuario2();
        }
        $this->chatRepository->save($chat);
    }
}