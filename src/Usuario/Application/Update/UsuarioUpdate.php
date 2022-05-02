<?php

namespace App\Usuario\Application\Update;


use App\Usuario\Domain\UsuarioFinder;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioUpdate
{
    private UsuarioFinder $finder;

    public function __construct(private UsuarioRepository $repository)
    {
        $this->finder = new UsuarioFinder($repository);
    }

    public function update(int $id, string $alias, string $nombre, string $apellidos, string $telefono, string $email): void
    {
        $usuario = $this->finder->__invoke($id);
        $usuario->update($alias, $nombre, $apellidos, $telefono, $email);
        $this->repository->save($usuario);
    }
}