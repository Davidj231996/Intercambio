<?php

namespace App\Intercambio\Domain;

class IntercambioFinder
{
    public function __construct(private IntercambioRepository $repository)
    {}

    public function __invoke(int $id): Intercambio
    {
        $intercambio = $this->repository->search($id);

        if ($intercambio === null) {
            throw new IntercambioNotFound($id);
        }

        return $intercambio;
    }
}