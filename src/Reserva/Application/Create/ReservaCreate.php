<?php

namespace App\Reserva\Application\Create;

use App\Email\Application\ReservaObjeto\ReservaObjetoEmail;
use App\LogReserva\Application\Create\LogReservaCreateCrear;
use App\Objeto\Domain\Objeto;
use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use App\Usuario\Domain\Usuario;
use DateTime;

class ReservaCreate
{
    public function __construct(
        private ReservaRepository     $repository,
        private LogReservaCreateCrear $logReservaCreateCrear,
        private ReservaObjetoEmail    $reservaObjetoEmail
    )
    {
    }

    public function create(Usuario $usuario, Objeto $objeto): void
    {
        $now = new DateTime();
        $reserva = Reserva::create(null, $usuario, $objeto, $now, $now);
        $this->repository->save($reserva);

        // Registramos en el log la creación de la reserva
        $this->logReservaCreateCrear->create($reserva);

        // Enviamos un correo de aviso a los usuarios
        $this->reservaObjetoEmail->send($reserva);
    }
}