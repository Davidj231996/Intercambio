<?php

namespace App\Objeto\Infraestructure\Persistence;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineRepository;

final class ObjetoRepositoryMySql extends DoctrineRepository implements ObjetoRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'nombre' => 'nombre',
        'descripcion' => 'descripcion',
        'estado' => 'estado',
        'usuarioId' => 'usuarioId'
    ];

    public function save(Objeto $objeto): void
    {
        $this->persist($objeto);
    }

    public function search(int $id): ?Objeto
    {
        return $this->repository(Objeto::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Objetos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $objetos = $this->repository(Objeto::class)->matching($doctrineCriteria)->toArray();

        return new Objetos($objetos);
    }
}