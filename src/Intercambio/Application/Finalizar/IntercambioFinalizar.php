<?php

namespace App\Intercambio\Application\Finalizar;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use DateTime;

class IntercambioFinalizar
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function update(int $id):void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->update(Intercambio::ESTADO_FINALIZADO, $now);
    }
}