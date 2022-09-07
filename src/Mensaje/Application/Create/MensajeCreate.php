<?php

namespace App\Mensaje\Application\Create;

use App\Chat\Application\ChatNoLeido\ChatNoLeido;
use App\Chat\Application\Update\ChatUpdate;
use App\Chat\Domain\Chat;
use App\Mensaje\Domain\Mensaje;
use App\Mensaje\Domain\MensajeRepository;
use App\Usuario\Application\ChatNoLeido\UsuarioChatNoLeido;
use App\Usuario\Domain\Usuario;
use DateTime;

class MensajeCreate
{
    public function __construct(
        private MensajeRepository  $mensajeRepository,
        private ChatUpdate         $chatUpdate,
        private ChatNoLeido        $chatNoLeido,
        private UsuarioChatNoLeido $usuarioChatNoLeido
    )
    {
    }

    public function create(Chat $chat, Usuario $usuario, string $mensaje): Mensaje
    {
        $mensaje = Mensaje::create(null, $chat, $usuario, $mensaje, new DateTime());
        $this->mensajeRepository->save($mensaje);

        $this->chatUpdate->update($chat);

        if ($usuario == $chat->usuario1() && $chat->leidoUsuario2()) {
            $this->chatNoLeido->marcarNoLeido($chat->usuario2(), $chat);
            $this->usuarioChatNoLeido->marcarNoLeido($chat->usuario2());
        } elseif ($usuario == $chat->usuario2() && $chat->leidoUsuario1()) {
            $this->chatNoLeido->marcarNoLeido($chat->usuario1(), $chat);
            $this->usuarioChatNoLeido->marcarNoLeido($chat->usuario1());
        }

        return $mensaje;
    }
}