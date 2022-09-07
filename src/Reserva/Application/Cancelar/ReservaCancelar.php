<?php

namespace App\Reserva\Application\Cancelar;

use App\Email\Application\ReservaObjetoRechazada\ReservaObjetoRechazadaEmail;
use App\LogReserva\Application\Create\LogReservaCreateCancelar;
use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use DateTime;

class ReservaCancelar
{
    public function __construct(
        private ReservaRepository           $repository,
        private LogReservaCreateCancelar    $logReservaCreateCancelar,
        private ReservaObjetoRechazadaEmail $reservaObjetoRechazadaEmail
    )
    {
    }

    public function update(int $id): void
    {
        $reserva = $this->repository->search($id);
        $now = new DateTime();
        $reserva->update(Reserva::ESTADO_CANCELADO, $now);
        $this->repository->save($reserva);

        // Registramos en el log la cancelación de la reserva
        $this->logReservaCreateCancelar->create($reserva);

        // Enviamos un correo de aviso a los usuarios
        $this->reservaObjetoRechazadaEmail->send($reserva);
    }
}