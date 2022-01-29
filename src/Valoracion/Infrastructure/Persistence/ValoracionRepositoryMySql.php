<?php

namespace App\Valoracion\Infrastructure\Persistence;

use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Valoracion\Domain\Valoracion;
use App\Valoracion\Domain\ValoracionRepository;

class ValoracionRepositoryMySql extends DoctrineRepository implements ValoracionRepository
{

    public function save(Valoracion $valoracion): void
    {
        $this->persist($valoracion);
    }

    public function search(int $usuarioId): ?Valoracion
    {
        return $this->repository(Valoracion::class)->findOneBy(['usuarioId' => $usuarioId]);
    }
}