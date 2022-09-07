<?php

namespace App\Tests\Objeto\Application\Create;

use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

final class ObjetoCreateTest extends ObjetoModuleUnitCase
{
    /** @test */
    public function crea_un_objeto_valido()
    {
        $objeto = ObjetoMother::new();

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);
    }
}