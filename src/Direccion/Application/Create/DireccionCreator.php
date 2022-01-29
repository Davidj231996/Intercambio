<?php

namespace App\Direccion\Application\Create;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;

class DireccionCreator
{
    public function __construct(private DireccionRepository $repository)
    {
    }

    public function create(int $id, string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal): void
    {
        $direccion = Direccion::create($id, $direccion, $ciudad, $provincia, $comunidadAutonoma, $codigoPostal);
        $this->repository->save($direccion);
    }
}