<?php

namespace App\Mensaje\Application\Create;

use App\Chat\Application\Update\ChatUpdate;
use App\Chat\Domain\Chat;
use App\Mensaje\Domain\Mensaje;
use App\Mensaje\Domain\MensajeRepository;
use App\Usuario\Domain\Usuario;
use DateTime;

class MensajeCreate
{
    public function __construct(private MensajeRepository $mensajeRepository, private ChatUpdate $chatUpdate)
    {
    }

    public function create(Chat $chat, Usuario $usuario, string $mensaje): Mensaje
    {
        $mensaje = Mensaje::create(null, $chat, $usuario, $mensaje, new DateTime());
        $this->mensajeRepository->save($mensaje);

        $this->chatUpdate->update($chat);
        return $mensaje;
    }
}