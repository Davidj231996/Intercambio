<?php

namespace App\Direccion\Domain;

class DireccionFinder
{
    public function __construct(private DireccionRepository $repository)
    {
    }

    public function __invoke(int $id): Direccion
    {
        $direccion = $this->repository->search($id);

        if ($direccion === null) {
            throw new DireccionNotFound($id);
        }

        return $direccion;
    }
}