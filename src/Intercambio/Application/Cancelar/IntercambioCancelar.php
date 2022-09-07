<?php

namespace App\Intercambio\Application\Cancelar;

use App\Email\Application\IntercambioObjetoCancelado\IntercambioObjetoCanceladoEmail;
use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\LogIntercambio\Application\Create\LogIntercambioCreateCancelar;
use App\Objeto\Domain\ObjetoRepository;
use App\Reserva\Domain\ReservaRepository;
use DateTime;

class IntercambioCancelar
{
    public function __construct(
        private IntercambioRepository           $repository,
        private ObjetoRepository                $objetoRepository,
        private ReservaRepository               $reservaRepository,
        private LogIntercambioCreateCancelar    $logIntercambioCreateCancelar,
        private IntercambioObjetoCanceladoEmail $intercambioObjetoCanceladoEmail
    )
    {
    }

    public function cancelar(int $id): void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_CANCELADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_CANCELADO, $now);
        $this->repository->save($intercambio);

        $intercambio->objetoIntercambiar()->reserva()->cancelar();
        $this->reservaRepository->save($intercambio->objetoIntercambiar()->reserva());

        $intercambio->objetoIntercambiar()->pendiente();
        $this->objetoRepository->save($intercambio->objetoIntercambiar());

        // Registramos en el log la cancelación del intercambio
        $this->logIntercambioCreateCancelar->create($intercambio);

        // Envia un correo de aviso a los usuarios
        $this->intercambioObjetoCanceladoEmail->send($intercambio);
    }
}