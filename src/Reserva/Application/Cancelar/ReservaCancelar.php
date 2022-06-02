<?php

namespace App\Reserva\Application\Cancelar;

use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use DateTime;

class ReservaCancelar
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function update(int $id): void
    {
        $reserva = $this->repository->search($id);
        $now = new DateTime();
        $reserva->update(Reserva::ESTADO_CANCELADO, $now);
        $this->repository->save($reserva);
    }
}