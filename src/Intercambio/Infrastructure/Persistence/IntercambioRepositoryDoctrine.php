<?php

namespace App\Intercambio\Infrastructure\Persistence;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class IntercambioRepositoryDoctrine extends DoctrineRepository implements IntercambioRepository
{

    public function save(Intercambio $intercambio): void
    {
        $this->persist($intercambio);
    }

    public function delete(Intercambio $intercambio): void
    {
        $this->remove($intercambio);
    }

    public function search(int $id): ?Intercambio
    {
        return $this->repository(Intercambio::class)->find($id);
    }
}