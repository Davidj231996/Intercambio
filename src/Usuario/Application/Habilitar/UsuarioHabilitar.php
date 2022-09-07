<?php

namespace App\Usuario\Application\Habilitar;


use App\Email\Application\UsuarioActivado\UsuarioActivadoEmail;
use App\Usuario\Domain\UsuarioFinder;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioHabilitar
{
    public function __construct(
        private UsuarioRepository $repository,
        private UsuarioFinder $usuarioFinder,
        private UsuarioActivadoEmail $usuarioActivadoEmail
    )
    {
        $this->finder = new UsuarioFinder($repository);
    }

    public function habilitar(int $id): void
    {
        $usuario = $this->usuarioFinder->__invoke($id);
        $usuario->habilitar();
        $this->repository->save($usuario);

        // Enviamos correo de aviso al usuario
        $this->usuarioActivadoEmail->send($usuario);
    }
}