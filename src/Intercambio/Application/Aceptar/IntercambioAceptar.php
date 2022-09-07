<?php

namespace App\Intercambio\Application\Aceptar;

use App\Email\Application\IntercambioObjetoAceptado\IntercambioObjetoAceptadoEmail;
use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\LogIntercambio\Application\Create\LogIntercambioCreateAceptar;
use App\Objeto\Domain\ObjetoRepository;
use DateTime;

class IntercambioAceptar
{
    public function __construct(
        private IntercambioRepository          $repository,
        private ObjetoRepository               $objetoRepository,
        private LogIntercambioCreateAceptar    $logIntercambioCreateAceptar,
        private IntercambioObjetoAceptadoEmail $intercambioObjetoAceptadoEmail
    )
    {
    }

    public function aceptar(int $id): void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_ACEPTADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_ACEPTADO, $now);
        $this->repository->save($intercambio);

        $intercambio->objetoIntercambiar()->transferir();
        $this->objetoRepository->save($intercambio->objetoIntercambiar());
        $intercambio->objetoIntercambio()->transferir();
        $this->objetoRepository->save($intercambio->objetoIntercambio());

        // Registramos en el log la aceptación del intercambio
        $this->logIntercambioCreateAceptar->create($intercambio);

        // Enviamos un correo de aviso a los usuarios
        $this->intercambioObjetoAceptadoEmail->send($intercambio);
    }
}