<?php

namespace App\Favorito\Domain;

use App\Shared\Domain\Criteria\Criteria;

interface FavoritoRepository
{
    public function save(Favorito $favorito): void;

    public function search(int $id): ?Favorito;

    public function searchByCriteria(Criteria $criteria): Favoritos;

    public function delete(Favorito $favorito): void;
}