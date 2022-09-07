<?php

namespace App\Intercambio\Application\Finalizar;

use App\Email\Application\IntercambioObjetoFinalizado\IntercambioObjetoFinalizadoEmail;
use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\LogIntercambio\Application\Create\LogIntercambioCreateFinalizar;
use DateTime;

class IntercambioFinalizarIntercambio
{
    public function __construct(
        private IntercambioRepository            $repository,
        private LogIntercambioCreateFinalizar    $logIntercambioCreateFinalizar,
        private IntercambioObjetoFinalizadoEmail $intercambioObjetoFinalizadoEmail
    )
    {
    }

    public function update(int $id): void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_FINALIZADO, $now);
        $this->repository->save($intercambio);

        // Registramos en el log la finalización del intercambio
        $this->logIntercambioCreateFinalizar->create($intercambio);

        // Envia un correo de aviso a los usuarios
        $this->intercambioObjetoFinalizadoEmail->send($intercambio, $intercambio->objetoIntercambio());
    }
}