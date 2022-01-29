<?php

namespace App\Valoracion\Application\Add;

use App\Valoracion\Domain\ValoracionRepository;

class ValoracionAdd
{
    public function __construct(private ValoracionRepository $repository)
    {}

    public function add(int $usuarioId, float $valor): void
    {
        $valoracion = $this->repository->search($usuarioId);
        $nuevoValor = ($valoracion->valoracionTotal() + $valor) / ($valoracion->totales() + 1);
        $valoracion->add($nuevoValor);
        $this->repository->save($valoracion);
    }
}