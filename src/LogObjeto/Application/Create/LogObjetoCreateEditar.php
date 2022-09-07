<?php

namespace App\LogObjeto\Application\Create;

use App\LogObjeto\Domain\LogObjeto;
use App\LogObjeto\Domain\LogObjetoRepository;
use App\Objeto\Domain\Objeto;
use DateTime;

class LogObjetoCreateEditar
{
    public function __construct(
        private LogObjetoRepository $repository
    ) {}

    public function create(Objeto $objeto)
    {
        $logObjeto = LogObjeto::create(null, $objeto, new DateTime(), LogObjeto::TIPO_EDITAR);
        $this->repository->save($logObjeto);
    }
}