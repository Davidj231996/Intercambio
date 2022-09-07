<?php

namespace App\Objeto\Application\Habilitar;

use App\Email\Application\ObjetoHabilitado\ObjetoHabilitadoEmail;
use App\LogObjeto\Application\Create\LogObjetoCreateHabilitar;
use App\Objeto\Domain\ObjetoFinder;
use App\Objeto\Domain\ObjetoRepository;

class ObjetoHabilitar
{
    private ObjetoFinder $finder;

    public function __construct(
        private ObjetoRepository         $repository,
        private LogObjetoCreateHabilitar $logObjetoCreateHabilitar,
        private ObjetoHabilitadoEmail    $objetoHabilitadoEmail
    )
    {
        $this->finder = new ObjetoFinder($repository);
    }

    public function habilitar(int $id): void
    {
        $objeto = $this->finder->__invoke($id);
        $objeto->pendiente();
        $this->repository->save($objeto);

        // Registramos en el log la habilitación del objeto
        $this->logObjetoCreateHabilitar->create($objeto);

        // Enviamos correo de aviso al usuario
        $this->objetoHabilitadoEmail->send($objeto);
    }
}