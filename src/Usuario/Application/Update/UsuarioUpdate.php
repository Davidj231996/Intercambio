<?php

namespace App\Usuario\Application\Update;


use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioFinder;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioUpdate
{
    public function __construct(private UsuarioRepository $repository)
    {
        $this->finder = new UsuarioFinder($repository);
    }

    public function update(Usuario $usuario, string $nombre, string $apellidos, string $telefono, string $email): void
    {
        $usuario->update($nombre, $apellidos, $telefono, $email);
        $this->repository->save($usuario);
    }
}