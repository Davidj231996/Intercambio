<?php

namespace App\Reserva\Domain;

class ReservaFinder
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function __invoke(int $id): Reserva
    {
        $reserva = $this->repository->search($id);

        if ($reserva === null) {
            throw new ReservaNotFound($id);
        }

        return $reserva;
    }
}