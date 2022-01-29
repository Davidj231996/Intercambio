<?php

namespace App\Imagen\Domain;

use App\Shared\Domain\Criteria\Criteria;

interface ImagenRepository
{
    public function save(Imagen $imagen): void;

    public function search(int $id): ?Imagen;

    public function searchByCriteria(Criteria $criteria): Imagenes;

    public function delete(Imagen $imagen): void;
}