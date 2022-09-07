<?php

namespace App\Direccion\Application\Create;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Email\Application\UsuarioRegistrado\UsuarioRegistradoEmail;
use App\Usuario\Domain\UsuarioFinder;

class DireccionCreate
{
    public function __construct(
        private DireccionRepository $repository,
        private UsuarioFinder $usuarioFinder,
        private UsuarioRegistradoEmail $usuarioRegistradoEmail
    )
    {
    }

    public function create(string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal, int $usuarioId): Direccion
    {
        $usuario = $this->usuarioFinder->__invoke($usuarioId);
        $direccion = Direccion::create(null, $direccion, $ciudad, $provincia, $comunidadAutonoma, $codigoPostal, $usuario);
        $this->repository->save($direccion);

        // Enviamos correo al usuario confirmando el registro
        $this->usuarioRegistradoEmail->send($usuario);

        return $direccion;
    }
}