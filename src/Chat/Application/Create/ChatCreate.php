<?php

namespace App\Chat\Application\Create;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use App\Usuario\Application\ChatNoLeido\UsuarioChatNoLeido;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioFinder;
use DateTime;

class ChatCreate
{
    public function __construct(
        private ChatRepository $chatRepository,
        private UsuarioFinder $usuarioFinder,
        private UsuarioChatNoLeido $usuarioChatNoLeido
    )
    {
    }

    public function create(Usuario $usuario1, int $idUsuario2): void
    {
        $now = new DateTime();
        $usuario2 = $this->usuarioFinder->__invoke($idUsuario2);
        $chat = Chat::create(null, $usuario1, $usuario2, $now);
        $this->chatRepository->save($chat);

        $this->usuarioChatNoLeido->marcarNoLeido($usuario2);
    }
}