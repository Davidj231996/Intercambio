<?php

namespace App\Objeto\Application\Delete;

use App\Objeto\Domain\ObjetoRepository;

class ObjetoDelete
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function delete(int $objetoId)
    {
        $objeto = $this->repository->search($objetoId);

        $this->repository->delete($objeto);
    }
}