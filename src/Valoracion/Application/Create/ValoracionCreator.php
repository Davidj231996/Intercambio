<?php

namespace App\Valoracion\Application\Create;

use App\Usuario\Domain\UsuarioRepository;
use App\Valoracion\Domain\Valoracion;
use App\Valoracion\Domain\ValoracionRepository;

class ValoracionCreator
{
    public function __construct(private ValoracionRepository $repository, private UsuarioRepository $usuarioRepository)
    {}

    public function create(int $usuarioId, float $valor): void
    {
        $usuario = $this->usuarioRepository->search($usuarioId);
        $valoracion = Valoracion::create(null, $usuario, $valor);
        $this->repository->save($valoracion);
    }
}