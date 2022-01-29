<?php

namespace App\Reserva\Application\Aceptar;

use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use DateTime;

class ReservaAceptar
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function update(int $id): void
    {
        $reserva = $this->repository->search($id);
        $now = new DateTime();
        $reserva->update(Reserva::ESTADO_ACEPTADO, $now);
        $this->repository->save($reserva);
    }
}