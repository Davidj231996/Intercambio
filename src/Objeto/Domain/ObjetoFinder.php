<?php

namespace App\Objeto\Domain;

final class ObjetoFinder
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function __invoke(int $id): Objeto
    {
        $objeto = $this->repository->search($id);

        if ($objeto === null) {
            throw new ObjetoNotFound($id);
        }

        return $objeto;
    }
}