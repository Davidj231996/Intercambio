<?php

namespace App\Favorito\Application\Delete;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;

class FavoritoDelete
{
    public function __construct(private FavoritoRepository $repository)
    {
    }

    public function delete(int $id): void
    {
        $favorito = $this->repository->search($id);
        $this->repository->delete($favorito);
    }
}