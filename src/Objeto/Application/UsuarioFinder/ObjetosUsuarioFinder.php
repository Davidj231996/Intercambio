<?php

namespace App\Objeto\Application\UsuarioFinder;

use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Usuario\Domain\Usuario;

class ObjetosUsuarioFinder
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function __invoke(Usuario $usuario): Objetos
    {
        return $this->repository->searchByUsuario($usuario);
    }
}