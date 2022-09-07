<?php

namespace App\LogReserva\Application\Create;

use App\LogReserva\Domain\LogReserva;
use App\LogReserva\Domain\LogReservaRepository;
use App\Reserva\Domain\Reserva;
use DateTime;

class LogReservaCreateCancelar
{
    public function __construct(
        private LogReservaRepository $repository
    )
    {}

    public function create(Reserva $reserva)
    {
        $logReserva = LogReserva::create(null, $reserva, new DateTime(), LogReserva::TIPO_CANCELAR);
        $this->repository->save($logReserva);
    }
}