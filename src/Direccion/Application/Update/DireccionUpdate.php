<?php

namespace App\Direccion\Application\Update;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;

class DireccionUpdate
{
    public function __construct(private DireccionRepository $repository)
    {}

    public function update(Direccion $direccionEntity, string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal): void
    {
        $direccionEntity->update($direccion, $ciudad, $provincia, $comunidadAutonoma, $codigoPostal);
        $this->repository->save($direccionEntity);
    }
}