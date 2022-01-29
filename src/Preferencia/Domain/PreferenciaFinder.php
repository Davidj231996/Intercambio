<?php

namespace App\Preferencia\Domain;

class PreferenciaFinder
{
    public function __construct(private PreferenciaRepository $repository)
    {
    }

    public function __invoke(int $id): Preferencia
    {
        $preferencia = $this->repository->search($id);

        if ($preferencia === null) {
            throw new PreferenciaNotFound($id);
        }

        return $preferencia;
    }
}