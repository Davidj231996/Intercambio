<?php

namespace App\Tests\Direccion\Application\Create;

use App\Tests\Direccion\DireccionModuleUnitCase;
use App\Tests\Direccion\Domain\DireccionMother;

class DireccionCreateTest extends DireccionModuleUnitCase
{
    /** @test */
    public function debe_crear_direccion()
    {
        $direccion = DireccionMother::new();

        $this->shouldSave($direccion);

        $this->repository()->save($direccion);
    }
}