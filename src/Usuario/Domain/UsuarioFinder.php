<?php

namespace App\Usuario\Domain;

final class UsuarioFinder
{
    public function __construct(private UsuarioRepository $repository)
    {
    }

    public function __invoke(int $id): Usuario
    {
        $usuario = $this->repository->search($id);

        if ($usuario === null) {
            throw new UsuarioNotFound($id);
        }

        return $usuario;
    }
}