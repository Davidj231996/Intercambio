<?php

namespace App\Objeto\Application\ObjetosHabilitadosUsuarioFinder;

use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Usuario\Domain\Usuario;

class ObjetosHabilitadosUsuarioFinder
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function finder(Usuario $usuario): ?Objetos
    {
        return $this->repository->searchHabilitadosByUsuario($usuario);
    }
}