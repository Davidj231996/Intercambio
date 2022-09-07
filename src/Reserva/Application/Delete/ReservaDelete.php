<?php

namespace App\Reserva\Application\Delete;

use App\LogReserva\Application\Create\LogReservaCreateEliminar;
use App\Reserva\Domain\ReservaRepository;

class ReservaDelete
{
    public function __construct(
        private ReservaRepository        $repository,
        private LogReservaCreateEliminar $logReservaCreateEliminar
    )
    {
    }

    public function delete(int $id): void
    {
        $reserva = $this->repository->search($id);
        $this->repository->delete($reserva);

        $this->logReservaCreateEliminar->create($reserva);
    }
}