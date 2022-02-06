<?php

namespace App\Direccion\Application\UsuarioFinder;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Usuario\Domain\Usuario;

class DireccionUsuarioFinder
{
    public function __construct(private DireccionRepository $repository)
    {}

    public function __invoke(Usuario $usuario): Direccion
    {
        return $this->repository->searchByUsuario($usuario);
    }
}