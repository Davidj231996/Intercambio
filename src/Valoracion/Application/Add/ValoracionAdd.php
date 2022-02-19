<?php

namespace App\Valoracion\Application\Add;

use App\Usuario\Domain\Usuario;
use App\Valoracion\Domain\ValoracionRepository;

class ValoracionAdd
{
    public function __construct(private ValoracionRepository $repository)
    {}

    public function add(Usuario $usuario, float $valor): void
    {
        $valoracion = $this->repository->search($usuario->id());
        $nuevoValor = ($valoracion->valoracionTotal() + $valor) / ($valoracion->totales() + 1);
        $valoracion->add($nuevoValor);
        $this->repository->save($valoracion);
    }
}