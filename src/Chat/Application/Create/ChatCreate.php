<?php

namespace App\Chat\Application\Create;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioFinder;
use DateTime;

class ChatCreate
{
    public function __construct(private ChatRepository $chatRepository, private UsuarioFinder $usuarioFinder)
    {
    }

    public function create(Usuario $usuario1, int $idUsuario2): Chat
    {
        $now = new DateTime();
        $chat = Chat::create(null, $usuario1, $this->usuarioFinder->__invoke($idUsuario2), $now);
        $this->chatRepository->save($chat);
        return $chat;
    }
}