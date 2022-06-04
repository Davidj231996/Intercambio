<?php

namespace App\Favorito\Application\Create;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;
use App\Objeto\Domain\Objeto;
use App\Usuario\Domain\Usuario;
use DateTime;

class FavoritoCreate
{

    public function __construct(private FavoritoRepository $repository)
    {
    }

    public function create(Usuario $usuario, Objeto $objeto): Favorito
    {
        $favorito = Favorito::create(null, $usuario, $objeto, new DateTime());

        $this->repository->save($favorito);

        return $favorito;
    }
}