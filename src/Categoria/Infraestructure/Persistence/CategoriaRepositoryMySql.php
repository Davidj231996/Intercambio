<?php

namespace App\Categoria\Infraestructure\Persistence;

use App\Categoria\Domain\Categoria;
use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineRepository;

class CategoriaRepositoryMySql extends DoctrineRepository implements CategoriaRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'nombre' => 'nombre',
        'descripcion' => 'descripcion'
    ];

    public function search(int $id): ?Categoria
    {
        return $this->repository(Categoria::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Categorias
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $categorias = $this->repository(Categoria::class)->matching($doctrineCriteria)->toArray();

        return new Categorias($categorias);
    }
}