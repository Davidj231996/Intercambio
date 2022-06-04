<?php

namespace App\Intercambio\Application\Enviar;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use DateTime;

class IntercambioEnviarIntercambio
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function update(int $id):void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambiar(Intercambio::ESTADO_ENVIADO, $now);
    }
}