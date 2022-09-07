<?php

namespace App\Intercambio\Application\Enviar;

use App\Email\Application\IntercambioObjetoEnviado\IntercambioObjetoEnviadoEmail;
use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\LogIntercambio\Application\Create\LogIntercambioCreateEnviar;
use DateTime;

class IntercambioEnviarIntercambio
{
    public function __construct(
        private IntercambioRepository         $repository,
        private LogIntercambioCreateEnviar    $logIntercambioCreateEnviar,
        private IntercambioObjetoEnviadoEmail $intercambioObjetoEnviadoEmail
    )
    {
    }

    public function update(int $id): void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_ENVIADO, $now);
        $this->repository->save($intercambio);

        // Registramos en el log el envío del intercambio
        $this->logIntercambioCreateEnviar->create($intercambio);

        // Envia un correo de aviso a los usuarios
        $this->intercambioObjetoEnviadoEmail->send($intercambio, $intercambio->objetoIntercambio());
    }
}