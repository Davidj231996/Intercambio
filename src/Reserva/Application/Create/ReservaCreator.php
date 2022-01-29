<?php

namespace App\Reserva\Application\Create;

use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use DateTime;

class ReservaCreator
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function create(int $id, int $usuarioId, int $objetoId): void
    {
        $now = new DateTime();
        $reserva = Reserva::create($id, $usuarioId, $objetoId, $now, $now);
        $this->repository->save($reserva);
    }
}