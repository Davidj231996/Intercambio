<?php

namespace App\Direccion\Application\Create;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioFinder;

class DireccionCreator
{
    public function __construct(private DireccionRepository $repository, private UsuarioFinder $usuarioFinder)
    {
    }

    public function create(array $direccionRequest): Direccion
    {
        $usuario = $this->usuarioFinder->__invoke($direccionRequest['usuario']);
        $direccion = Direccion::create(null, $direccionRequest['direccion'], $direccionRequest['ciudad'], $direccionRequest['provincia'], $direccionRequest['comunidadAutonoma'], $direccionRequest['codigoPostal'], $usuario);
        $this->repository->save($direccion);
        return $direccion;
    }
}