<?php

namespace App\Usuario\Application\Deshabilitar;


use App\Email\Application\UsuarioDesactivado\UsuarioDesactivadoEmail;
use App\Usuario\Domain\UsuarioFinder;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioDeshabilitar
{
    public function __construct(
        private UsuarioRepository $repository,
        private UsuarioDesactivadoEmail $usuarioDesactivadoEmail
    )
    {
        $this->finder = new UsuarioFinder($repository);
    }

    public function deshabilitar(int $id): void
    {
        $usuario = $this->repository->search($id);
        $usuario->deshabilitar();
        $this->repository->save($usuario);

        // Enviamos correo de aviso al usuario
        $this->usuarioDesactivadoEmail->send($usuario);
    }
}