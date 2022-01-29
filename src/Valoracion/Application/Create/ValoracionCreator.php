<?php

namespace App\Valoracion\Application\Create;

use App\Valoracion\Domain\Valoracion;
use App\Valoracion\Domain\ValoracionRepository;

class ValoracionCreator
{
    public function __construct(private ValoracionRepository $repository)
    {}

    public function create(int $id, int $usuarioId, float $valor): void
    {
        $valoracion = Valoracion::create($id, $usuarioId, $valor);
        $this->repository->save($valoracion);
    }
}