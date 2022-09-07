<?php

namespace App\Intercambio\Application\Create;

use App\Email\Application\IntercambioObjeto\IntercambioObjetoEmail;
use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\LogIntercambio\Application\Create\LogIntercambioCreateCreacion;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use DateTime;

class IntercambioCreate
{
    public function __construct(
        private IntercambioRepository        $repository,
        private ObjetoRepository             $objetoRepository,
        private LogIntercambioCreateCreacion $logIntercambioCreateCreacion,
        private IntercambioObjetoEmail       $intercambioObjetoEmail
    )
    {
    }

    public function create(Objeto $objetoIntercambio, Objeto $objetoIntercambiar): void
    {
        $now = new DateTime();
        $intercambio = Intercambio::create(null, $objetoIntercambio, $objetoIntercambiar, $objetoIntercambio->usuario(), $objetoIntercambiar->usuario(), $now, $now);
        $this->repository->save($intercambio);

        $objetoIntercambio->reservar($objetoIntercambiar->reserva());
        $this->objetoRepository->save($objetoIntercambio);

        // Registramos en el log la creación del intercambio
        $this->logIntercambioCreateCreacion->create($intercambio);

        // Enviamos un correo de aviso a los usuarios
        $this->intercambioObjetoEmail->send($intercambio);
    }
}