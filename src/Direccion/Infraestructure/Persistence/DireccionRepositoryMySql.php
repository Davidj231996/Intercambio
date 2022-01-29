<?php

namespace App\Direccion\Infraestructure\Persistence;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineRepository;

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
}