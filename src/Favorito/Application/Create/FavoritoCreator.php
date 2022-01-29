<?php

namespace App\Favorito\Application\Create;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;
use DateTime;

class FavoritoCreator
{

    public function __construct(private FavoritoRepository $repository)
    {
    }

    public function create(int $id, int $usuarioId, int $objetoId, DateTime $fecha): Favorito
    {
        $favorito = Favorito::create($id, $usuarioId, $objetoId, $fecha);

        $this->repository->save($favorito);

        return $favorito;
    }
}