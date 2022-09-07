<?php

namespace App\Objeto\Application\Update;

use App\LogObjeto\Application\Create\LogObjetoCreateEditar;
use App\Objeto\Domain\ObjetoFinder;
use App\Objeto\Domain\ObjetoRepository;
use App\Usuario\Domain\Usuario;

class ObjetoUpdate
{
    private ObjetoFinder $finder;

    public function __construct(
        private ObjetoRepository      $repository,
        private LogObjetoCreateEditar $logObjetoCreateEditar
    )
    {
        $this->finder = new ObjetoFinder($repository);
    }

    public function update(int $id, string $nombre, string $descripcion, int $estado): void
    {
        $objeto = $this->finder->__invoke($id);
        $objeto->update($nombre, $descripcion, $estado);
        $this->repository->save($objeto);

        $this->logObjetoCreateEditar->create($objeto);
    }
}