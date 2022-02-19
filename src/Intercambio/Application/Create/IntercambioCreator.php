<?php

namespace App\Intercambio\Application\Create;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\Objeto\Domain\Objeto;
use DateTime;

class IntercambioCreator
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function create(Objeto $objetoIntercambio, Objeto $objetoIntercambiar): void
    {
        $now = new DateTime();
        $intercambio = Intercambio::create(null, $objetoIntercambio, $objetoIntercambiar, $now, $now);
        $this->repository->save($intercambio);
    }
}