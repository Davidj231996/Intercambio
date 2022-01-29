<?php

declare(strict_types=1);

namespace App\Objeto\Domain;

use App\Shared\Domain\Criteria\Criteria;

interface ObjetoRepository
{
    public function save(Objeto $video): void;

    public function search(int $id): ?Objeto;

    public function searchByCriteria(Criteria $criteria): Objetos;
}