<?php

namespace App\Direccion\Application\Create;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioFinder;

class DireccionCreate
{
    public function __construct(private DireccionRepository $repository, private UsuarioFinder $usuarioFinder)
    {
    }

    public function create(string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal, int $usuarioId): Direccion
    {
        $usuario = $this->usuarioFinder->__invoke($usuarioId);
        $direccion = Direccion::create(null, $direccion, $ciudad, $provincia, $comunidadAutonoma, $codigoPostal, $usuario);
        $this->repository->save($direccion);
        return $direccion;
    }
}