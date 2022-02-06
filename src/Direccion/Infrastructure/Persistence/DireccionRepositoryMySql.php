<?php

namespace App\Direccion\Infrastructure\Persistence;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;

class DireccionRepositoryMySql extends DoctrineRepository implements DireccionRepository
{
    public function save(Direccion $direccion): void
    {
        $this->persist($direccion);
    }

    public function search(int $id): ?Direccion
    {
        return $this->repository(Direccion::class)->find($id);
    }

    public function searchByUsuario(Usuario $usuario): ?Direccion
    {
        return $this->repository(Direccion::class)->findOneBy(['usuario' => $usuario]);
    }
}