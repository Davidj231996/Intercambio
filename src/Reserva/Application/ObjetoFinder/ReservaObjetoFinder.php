<?php

namespace App\Reserva\Application\ObjetoFinder;

use App\Reserva\Domain\ReservaRepository;
use App\Reserva\Domain\Reservas;

class ReservaObjetoFinder
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function __invoke($objetoId): Reservas
    {
        return $this->repository->searchByObjeto($objetoId);
    }
}