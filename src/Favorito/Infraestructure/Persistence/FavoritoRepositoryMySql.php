<?php

namespace App\Favorito\Infraestructure\Persistence;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;
use App\Favorito\Domain\Favoritos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineRepository;

class FavoritoRepositoryMySql extends DoctrineRepository implements FavoritoRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'usuarioId' => 'usuarioId',
        'objetoId' => 'objetoId',
        'fecha' => 'fecha'
    ];

    public function save(Favorito $favorito): void
    {
        $this->persist($favorito);
    }

    public function search(int $id): Favorito
    {
        return $this->repository(Favorito::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Favoritos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $favoritos = $this->repository(Favorito::class)->matching($doctrineCriteria)->toArray();

        return new Favoritos($favoritos);
    }

    public function delete(Favorito $favorito): void
    {
        $this->remove($favorito);
    }
}