<?php

namespace App\Favorito\Application\Existe;

use App\Favorito\Domain\FavoritoRepository;
use App\Objeto\Domain\Objeto;
use App\Usuario\Domain\Usuario;

class FavoritoExiste
{
    public function __construct(private FavoritoRepository $repository)
    {
    }

    public function existe(Usuario $usuario, Objeto $objeto): bool
    {
        $favorito = $this->repository->searchByUsuarioObjeto($usuario, $objeto);

        return (bool)$favorito;
    }
}