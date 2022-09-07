<?php

namespace App\Tests\Objeto\Application\Deshabilitar;

use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

class ObjetoDeshabilitarTest extends ObjetoModuleUnitCase
{
    /** @test */
    public function debe_deshabilitar_objeto()
    {
        $objeto = ObjetoMother::create(estado: Objeto::ESTADO_PENDIENTE);
        $objeto->deshabilitar();

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);
    }
}