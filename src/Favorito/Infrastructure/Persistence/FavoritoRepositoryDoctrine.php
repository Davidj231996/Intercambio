<?php

namespace App\Favorito\Infrastructure\Persistence;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;
use App\Favorito\Domain\Favoritos;
use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;

class FavoritoRepositoryDoctrine extends DoctrineRepository implements FavoritoRepository
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

    public function search(int $id): ?Favorito
    {
        return $this->repository(Favorito::class)->find($id);
    }

    public function searchByUsuarioObjeto(Usuario $usuario, Objeto $objeto): ?Favorito
    {
        return $this->repository(Favorito::class)->findOneBy(['usuario' => $usuario, 'objeto' => $objeto]);
    }

    public function delete(Favorito $favorito): void
    {
        $this->remove($favorito);
    }
}