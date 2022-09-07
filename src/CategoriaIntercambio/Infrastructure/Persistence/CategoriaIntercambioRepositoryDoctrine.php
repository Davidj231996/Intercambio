<?php

namespace App\CategoriaIntercambio\Infrastructure\Persistence;

use App\CategoriaIntercambio\Domain\CategoriaIntercambio;
use App\CategoriaIntercambio\Domain\CategoriaIntercambioRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class CategoriaIntercambioRepositoryDoctrine extends DoctrineRepository implements CategoriaIntercambioRepository
{
    public function save(CategoriaIntercambio $categoriaIntercambio): void
    {
        $this->persist($categoriaIntercambio);
    }

    public function delete(CategoriaIntercambio $categoriaIntercambio): void
    {
        $this->remove($categoriaIntercambio);
    }
}