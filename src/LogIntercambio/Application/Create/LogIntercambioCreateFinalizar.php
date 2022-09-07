<?php

namespace App\LogIntercambio\Application\Create;

use App\Intercambio\Domain\Intercambio;
use App\LogIntercambio\Domain\LogIntercambio;
use App\LogIntercambio\Domain\LogIntercambioRepository;
use DateTime;

class LogIntercambioCreateFinalizar
{
    public function __construct(
        private LogIntercambioRepository $repository
    )
    {
    }

    public function create(Intercambio $intercambio)
    {
        $logIntercambio = LogIntercambio::create(null, $intercambio, new DateTime(), LogIntercambio::TIPO_FINALIZAR);
        $this->repository->save($logIntercambio);
    }
}