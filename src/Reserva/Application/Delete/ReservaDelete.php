<?php

namespace App\Reserva\Application\Delete;

use App\Reserva\Domain\ReservaRepository;

class ReservaDelete
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function delete(int $id): void
    {
        $reserva = $this->repository->search($id);
        $this->repository->delete($reserva);
    }
}