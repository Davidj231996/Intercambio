<?php

namespace App\Intercambio\Application\Aceptar;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use DateTime;

class IntercambioAceptar
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function update(int $id):void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_ACEPTADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_ACEPTADO, $now);
        $this->repository->save($intercambio);
    }
}