<?php

namespace App\Reserva\Application\Create;

use App\Objeto\Domain\Objeto;
use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use App\Usuario\Domain\Usuario;
use DateTime;

class ReservaCreator
{
    public function __construct(private ReservaRepository $repository)
    {
    }

    public function create(Usuario $usuario, Objeto $objeto): void
    {
        $now = new DateTime();
        $reserva = Reserva::create(null, $usuario, $objeto, $now, $now);
        $this->repository->save($reserva);
    }
}