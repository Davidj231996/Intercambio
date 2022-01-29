<?php

namespace App\Preferencia\Infraestructure\Persistence;

use App\Preferencia\Domain\Preferencia;
use App\Preferencia\Domain\PreferenciaRepository;
use App\Shared\Infraestructure\Persistence\Doctrine\DoctrineRepository;

class PreferenciaRepositoryMysql extends DoctrineRepository implements PreferenciaRepository
{

    public function save(Preferencia $preferencia): void
    {
        $this->persist($preferencia);
    }

    public function delete(Preferencia $preferencia): void
    {
        $this->remove($preferencia);
    }

    public function search(int $id): ?Preferencia
    {
        return $this->repository(Preferencia::class)->find($id);
    }
}