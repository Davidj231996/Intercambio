<?php

namespace App\Usuario\Infraestructure\Persistence;

use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use App\Usuario\Domain\Usuarios;

final class UsuarioRepositoryMySql extends DoctrineRepository implements UsuarioRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'alias' => 'alias',
        'nombre' => 'nombre',
        'apellidos' => 'apellidos',
        'telefono' => 'telefono',
        'email' => 'email',
        'password' => 'password'
    ];

    public function save(Usuario $usuario): void
    {
        $this->persist($usuario);
    }

    public function search(int $id): ?Usuario
    {
        return $this->repository(Usuario::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Usuarios
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $usuarios = $this->repository(Usuario::class)->matching($doctrineCriteria)->toArray();

        return new Usuarios($usuarios);
    }
}