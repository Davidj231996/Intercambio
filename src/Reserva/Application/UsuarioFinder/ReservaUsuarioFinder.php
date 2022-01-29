<?php

namespace App\Reserva\Application\UsuarioFinder;

use App\Reserva\Domain\ReservaRepository;
use App\Reserva\Domain\Reservas;

class ReservaUsuarioFinder
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function __invoke($usuarioId): Reservas
    {
        return $this->repository->searchByUsuario($usuarioId);
    }
}