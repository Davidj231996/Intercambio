<?php

namespace App\Favorito\Application\Create;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;
use App\Objeto\Domain\Objeto;
use App\Usuario\Domain\Usuario;
use DateTime;

class FavoritoCreator
{

    public function __construct(private FavoritoRepository $repository)
    {
    }

    public function create(Usuario $usuario, Objeto $objeto, DateTime $fecha): Favorito
    {
        $favorito = Favorito::create(null, $usuario, $objeto, $fecha);

        $this->repository->save($favorito);

        return $favorito;
    }
}