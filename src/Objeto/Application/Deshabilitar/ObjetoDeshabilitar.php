<?php

namespace App\Objeto\Application\Deshabilitar;

use App\Email\Application\ObjetoDeshabilitado\ObjetoDeshabilitadoEmail;
use App\LogObjeto\Application\Create\LogObjetoCreateDeshabilitar;
use App\Objeto\Domain\ObjetoFinder;
use App\Objeto\Domain\ObjetoRepository;

class ObjetoDeshabilitar
{
    private ObjetoFinder $finder;

    public function __construct(
        private ObjetoRepository            $repository,
        private LogObjetoCreateDeshabilitar $logObjetoCreateDeshabilitar,
        private ObjetoDeshabilitadoEmail    $objetoDeshabilitadoEmail
    )
    {
        $this->finder = new ObjetoFinder($repository);
    }

    public function deshabilitar(int $id): void
    {
        $objeto = $this->finder->__invoke($id);
        $objeto->deshabilitar();
        $this->repository->save($objeto);

        // Registramos en el log la deshabilitación del objeto
        $this->logObjetoCreateDeshabilitar->create($objeto);

        // Enviamos correo de aviso al usuario
        $this->objetoDeshabilitadoEmail->send($objeto);
    }
}