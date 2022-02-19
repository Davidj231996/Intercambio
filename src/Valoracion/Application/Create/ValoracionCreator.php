<?php

namespace App\Valoracion\Application\Create;

use App\Usuario\Domain\Usuario;
use App\Valoracion\Domain\Valoracion;
use App\Valoracion\Domain\ValoracionRepository;

class ValoracionCreator
{
    public function __construct(private ValoracionRepository $repository)
    {}

    public function create(Usuario $usuario, float $valor): void
    {
        $valoracion = Valoracion::create(null, $usuario, $valor);
        $this->repository->save($valoracion);
    }
}