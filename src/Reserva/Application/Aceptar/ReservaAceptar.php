<?php

namespace App\Reserva\Application\Aceptar;

use App\Email\Application\ReservaObjetoAceptada\ReservaObjetoAceptadaEmail;
use App\LogReserva\Application\Create\LogReservaCreateAceptar;
use App\Objeto\Domain\ObjetoRepository;
use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use DateTime;

class ReservaAceptar
{
    public function __construct(
        private ReservaRepository          $repository,
        private ObjetoRepository           $objetoRepository,
        private LogReservaCreateAceptar    $logReservaCreateAceptar,
        private ReservaObjetoAceptadaEmail $reservaObjetoAceptadaEmail
    )
    {
    }

    public function update(int $id): void
    {
        $reserva = $this->repository->search($id);
        $now = new DateTime();
        $reserva->update(Reserva::ESTADO_ACEPTADO, $now);
        $this->repository->save($reserva);

        $reserva->objeto()->reservar($reserva);
        $this->objetoRepository->save($reserva->objeto());

        // Registramos en el log la aceptación de la reserva
        $this->logReservaCreateAceptar->create($reserva);

        // Enviamos un correo de aviso a los usuarios
        $this->reservaObjetoAceptadaEmail->send($reserva);
    }
}