<?php

namespace App\Valoracion\Domain;

class ValoracionFinder
{
    public function __construct(private ValoracionRepository $repository)
    {}

    public function __invoke(int $usuarioId): Valoracion
    {
        $valoracion = $this->repository->search($usuarioId);

        if ($valoracion === null) {
            throw new ValoracionNotFound($usuarioId);
        }

        return $valoracion;
    }
}