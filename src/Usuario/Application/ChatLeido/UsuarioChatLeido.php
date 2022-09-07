<?php

namespace App\Usuario\Application\ChatLeido;

use App\Chat\Domain\Chat;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioChatLeido
{
    public function __construct(private UsuarioRepository $repository)
    {
    }

    public function marcarLeido(Usuario $usuario, Chat $chat): void
    {
        if (($usuario == $chat->usuario1() && !$chat->leidoUsuario1()) || ($usuario == $chat->usuario2() && !$chat->leidoUsuario2())) {
            $usuario->updateLeido();
            $this->repository->save($usuario);
        }
    }
}