<?php

namespace App\CategoriaObjeto\Infrastructure\Persistence;

use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\CategoriaObjeto\Domain\CategoriaObjetoRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class CategoriaObjetoRepositoryMySql extends DoctrineRepository implements CategoriaObjetoRepository
{
    public function save(CategoriaObjeto $objeto): void
    {
        $this->persist($objeto);
    }

    public function delete(CategoriaObjeto $categoriaObjeto): void
    {
        $this->remove($categoriaObjeto);
    }
}