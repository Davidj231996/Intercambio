<?php

namespace App\Intercambio\Application\Create;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\Objeto\Domain\Objeto;
use App\Usuario\Domain\Usuario;
use DateTime;

class IntercambioCreate
{
    public function __construct(private IntercambioRepository $repository)
    {
    }

    public function create(Objeto $objetoIntercambio, Objeto $objetoIntercambiar, Usuario $usuarioIntercambio, Usuario $usuarioIntercambiar): void
    {
        $now = new DateTime();
        $intercambio = Intercambio::create(null, $objetoIntercambio, $objetoIntercambiar, $usuarioIntercambio, $usuarioIntercambiar, $now, $now);
        $this->repository->save($intercambio);
    }
}