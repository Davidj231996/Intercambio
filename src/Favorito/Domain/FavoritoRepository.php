<?php

namespace App\Favorito\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Criteria\Criteria;
use App\Usuario\Domain\Usuario;

interface FavoritoRepository
{
    public function save(Favorito $favorito): void;

    public function search(int $id): ?Favorito;

    public function searchByUsuarioObjeto(Usuario $usuario, Objeto $objeto): ?Favorito;

    public function searchByCriteria(Criteria $criteria): Favoritos;

    public function delete(Favorito $favorito): void;
}