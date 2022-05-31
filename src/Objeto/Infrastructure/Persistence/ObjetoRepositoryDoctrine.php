<?php

namespace App\Objeto\Infrastructure\Persistence;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;

final class ObjetoRepositoryDoctrine extends DoctrineRepository implements ObjetoRepository
{
    private static array $criteriaToDoctrineFields = [
        'nombre' => 'nombre',
        'descripcion' => 'descripcion'
    ];

    public function save(Objeto $objeto): void
    {
        $this->persist($objeto);
    }

    public function search(int $id): ?Objeto
    {
        return $this->repository(Objeto::class)->find($id);
    }

    public function searchByUsuario(Usuario $usuario): ?Objetos
    {
        $objetos = $this->repository(Objeto::class)->findBy(['usuario' => $usuario]);
        return new Objetos($objetos);
    }

    public function searchByCriteria(Criteria $criteria): ?Objetos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $objetos = $this->repository(Objeto::class)->matching($doctrineCriteria)->toArray();

        return new Objetos($objetos);
    }

    public function delete(Objeto $objeto): void
    {
        $this->remove($objeto);
    }
}