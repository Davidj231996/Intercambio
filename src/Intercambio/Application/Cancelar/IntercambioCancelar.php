<?php

namespace App\Intercambio\Application\Cancelar;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use DateTime;

class IntercambioCancelar
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function update(int $id):void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_CANCELADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_CANCELADO, $now);
        $this->repository->save($intercambio);
    }
}