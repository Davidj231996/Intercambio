<?php

namespace App\Intercambio\Application\Aceptar;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\Objeto\Domain\ObjetoRepository;
use DateTime;

class IntercambioAceptar
{
    public function __construct(private IntercambioRepository $repository, private ObjetoRepository $objetoRepository)
    {
    }

    public function update(int $id):void
    {
        $intercambio = $this->repository->search($id);
        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_ACEPTADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_ACEPTADO, $now);
        $this->repository->save($intercambio);

        $intercambio->objetoIntercambiar()->transferir();
        $this->objetoRepository->save($intercambio->objetoIntercambiar());
        $intercambio->objetoIntercambio()->transferir();
        $this->objetoRepository->save($intercambio->objetoIntercambio());
    }
}