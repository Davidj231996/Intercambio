<?php

namespace App\Favorito\Domain;

class FavoritoFinder
{
    public function __construct(private FavoritoRepository $repository)
    {
    }

    public function __invoke(int $id): Favorito
    {
        $favorito = $this->repository->search($id);

        if ($favorito === null) {
            throw new FavoritoNotFound($id);
        }

        return $favorito;
    }
}