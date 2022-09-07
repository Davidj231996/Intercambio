<?php

namespace App\LogObjeto\Application\Create;

use App\LogObjeto\Domain\LogObjeto;
use App\LogObjeto\Domain\LogObjetoRepository;
use App\Objeto\Domain\Objeto;
use DateTime;

class LogObjetoCreateCrear
{
    public function __construct(
        private LogObjetoRepository $repository
    ) {}

    public function create(Objeto $objeto)
    {
        $logObjeto = LogObjeto::create(null, $objeto, new DateTime(), LogObjeto::TIPO_CREAR);
        $this->repository->save($logObjeto);
    }
}