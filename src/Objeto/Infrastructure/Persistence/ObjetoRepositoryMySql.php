<?php

namespace App\Objeto\Infrastructure\Persistence;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;

final class ObjetoRepositoryMySql extends DoctrineRepository implements ObjetoRepository
{
    public function save(Objeto $objeto): void
    {
        $this->persist($objeto);
    }

    public function search(int $id): ?Objeto
    {
        return $this->repository(Objeto::class)->find($id);
    }

    public function searchByUsuario(Usuario $usuario): ?Objetos
    {
        $objetos = $this->repository(Objeto::class)->findBy(['usuario' => $usuario]);
        return new Objetos($objetos);
    }
}