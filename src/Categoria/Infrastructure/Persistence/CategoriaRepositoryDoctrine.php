<?php

namespace App\Categoria\Infrastructure\Persistence;

use App\Categoria\Domain\Categoria;
use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class CategoriaRepositoryDoctrine extends DoctrineRepository implements CategoriaRepository
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

    public function searchAll(): Categorias
    {
        $categorias = $this->repository(Categoria::class)->findAll();
        return new Categorias($categorias);
    }

    public function searchByCriteria(Criteria $criteria): Categorias
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $categorias = $this->repository(Categoria::class)->matching($doctrineCriteria)->toArray();

        return new Categorias($categorias);
    }
}