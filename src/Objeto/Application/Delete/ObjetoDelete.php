<?php

namespace App\Objeto\Application\Delete;

use App\Objeto\Domain\ObjetoNotFound;
use App\Objeto\Domain\ObjetoRepository;

class ObjetoDelete
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function delete(int $objetoId)
    {
        $objeto = $this->repository->search($objetoId);

        if ($objeto === null) {
            throw new ObjetoNotFound($objetoId);
        }

        $this->repository->delete($objeto);
    }
}