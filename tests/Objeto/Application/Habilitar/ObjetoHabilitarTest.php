<?php

namespace App\Tests\Objeto\Application\Habilitar;

use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

class ObjetoHabilitarTest extends ObjetoModuleUnitCase
{
    /** @test */
    public function debe_habilitar_objeto()
    {
        $objeto = ObjetoMother::new();
        $objeto->pendiente();

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);
    }
}