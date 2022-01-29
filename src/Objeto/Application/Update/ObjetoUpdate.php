<?php

namespace App\Objeto\Application\Update;

use App\Objeto\Domain\ObjetoFinder;
use App\Objeto\Domain\ObjetoRepository;

class ObjetoUpdate
{
    private ObjetoFinder $finder;

    public function __construct(private ObjetoRepository $repository)
    {
        $this->finder = new ObjetoFinder($repository);
    }

    public function update(int $id, string $nombre, string $descripcion, int $estado, int $usuarioId): void
    {
        $objeto = $this->finder->__invoke($id);
        $objeto->update($nombre, $descripcion, $estado, $usuarioId);
        $this->repository->save($objeto);
    }
}