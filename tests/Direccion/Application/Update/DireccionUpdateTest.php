<?php

namespace App\Tests\Direccion\Application\Update;

use App\Direccion\Application\Update\DireccionUpdate;
use App\Tests\Direccion\DireccionModuleUnitCase;
use App\Tests\Direccion\Domain\DireccionMother;

class DireccionUpdateTest extends DireccionModuleUnitCase
{
    private DireccionUpdate $update;

    protected function setUp(): void
    {
        parent::setUp();

        $this->update = new DireccionUpdate($this->repository());
    }

    /** @test */
    public function debe_actualizar_direccion()
    {
        $direccion = DireccionMother::create();
        $direccion2 = DireccionMother::create($direccion->id(), "Calle Nueva", $direccion->ciudad(), $direccion->provincia(), $direccion->comunidadAutonoma(), $direccion->codigoPostal(), $direccion->usuario());

        $this->shouldSave($direccion2);

        $this->update->update($direccion, "Calle Nueva", $direccion->ciudad(), $direccion->provincia(), $direccion->comunidadAutonoma(), $direccion->codigoPostal());
    }
}