<?php

namespace App\Intercambio\Application\Create;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use DateTime;

class IntercambioCreator
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function create(int $objetoIntercambioId, int $objetoIntercambiarId): void
    {
        $now = new DateTime();
        $intercambio = Intercambio::create(null, $objetoIntercambioId, $objetoIntercambiarId, $now, $now);
        $this->repository->save($intercambio);
    }
}