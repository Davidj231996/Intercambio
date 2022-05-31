<?php

namespace App\Imagen\Infrastructure\Persistence;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\Imagenes;
use App\Imagen\Domain\ImagenRepository;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class ImagenRepositoryDoctrine extends DoctrineRepository implements ImagenRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'descripcion' => 'descripcion',
        'ruta' => 'ruta'
    ];

    public function save(Imagen $imagen): void
    {
        $this->persist($imagen);
    }

    public function search(int $id): ?Imagen
    {
        return $this->repository(Imagen::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Imagenes
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $imagenes = $this->repository(Imagen::class)->matching($doctrineCriteria)->toArray();

        return new Imagenes($imagenes);
    }

    public function delete(Imagen $imagen): void
    {
        $this->remove($imagen);
    }
}