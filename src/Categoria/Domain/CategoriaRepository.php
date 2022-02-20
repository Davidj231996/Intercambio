<?php

namespace App\Categoria\Domain;

use App\Shared\Domain\Criteria\Criteria;

interface CategoriaRepository
{
    public function search(int $id): ?Categoria;

    public function searchAll(): Categorias;

    public function searchByCriteria(Criteria $criteria): Categorias;
}