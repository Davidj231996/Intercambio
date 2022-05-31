<?php

namespace App\Reserva\Infrastructure\Persistence;

use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use App\Reserva\Domain\Reservas;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class ReservaRepositoryDoctrine extends DoctrineRepository implements ReservaRepository
{
    public function save(Reserva $reserva): void
    {
        $this->persist($reserva);
    }

    public function delete(Reserva $reserva): void
    {
        $this->remove($reserva);
    }

    public function search(int $id): ?Reserva
    {
        return $this->repository(Reserva::class)->find($id);
    }

    public function searchByUsuario(int $usuarioId): Reservas
    {
        $reservas = $this->repository(Reserva::class)->findBy(['usuarioId' => $usuarioId]);
        return new Reservas($reservas);
    }

    public function searchByObjeto(int $objetoId): Reservas
    {
        $reservas = $this->repository(Reserva::class)->findBy(['objetoId' => $objetoId]);
        return new Reservas($reservas);
    }
}