<?php

namespace App\Intercambio\Infrastructure\Persistence;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\Intercambio\Domain\Intercambios;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class IntercambioRepositoryMySql extends DoctrineRepository implements IntercambioRepository
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

    public function searchByObjetoIntercambio(int $objetoIntercambioId): Intercambios
    {
        $intercambios = $this->repository(Intercambio::class)->findBy(['objetoIntercambioId' => $objetoIntercambioId]);
        return new Intercambios($intercambios);
    }

    public function searchByObjetoIntercambiar(int $objetoIntercambiarId): Intercambios
    {
        $intercambios = $this->repository(Intercambio::class)->findBy(['objetoIntercambiarId' => $objetoIntercambiarId]);
        return new Intercambios($intercambios);
    }
}