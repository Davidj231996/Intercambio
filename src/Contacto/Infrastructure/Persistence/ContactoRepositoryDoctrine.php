<?php

namespace App\Contacto\Infrastructure\Persistence;

use App\Contacto\Domain\Contacto;
use App\Contacto\Domain\ContactoRepository;
use App\Contacto\Domain\Contactos;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class ContactoRepositoryDoctrine extends DoctrineRepository implements ContactoRepository
{

    public function save(Contacto $contacto): void
    {
        $this->persist($contacto);
    }

    public function search(int $id): ?Contacto
    {
        return $this->repository(Contacto::class)->find($id);
    }

    public function searchContestados(): ?Contactos
    {
        $contactos = $this->repository(Contacto::class)->createQueryBuilder('contacto')
            ->where('contacto.estado = :estado')
            ->setParameter('estado', Contacto::ESTADO_CONTESTADO)
            ->getQuery()->execute();

        return new Contactos($contactos);
    }

    public function searchNoContestados(): ?Contactos
    {
        $contactos = $this->repository(Contacto::class)->createQueryBuilder('contacto')
            ->where('contacto.estado = :estado')
            ->setParameter('estado', Contacto::ESTADO_NO_CONTESTADO)
            ->getQuery()->execute();

        return new Contactos($contactos);
    }
}