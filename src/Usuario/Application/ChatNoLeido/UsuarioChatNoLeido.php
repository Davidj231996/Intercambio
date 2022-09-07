<?php

namespace App\Usuario\Application\ChatNoLeido;

use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioChatNoLeido
{
    public function __construct(private UsuarioRepository $usuarioRepository)
    {
    }

    public function marcarNoLeido(Usuario $usuario)
    {
        $usuario->updateNoLeido();
        $this->usuarioRepository->save($usuario);
    }
}