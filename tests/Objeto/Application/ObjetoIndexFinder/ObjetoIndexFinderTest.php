<?php

namespace App\Tests\Objeto\Application\ObjetoIndexFinder;

use App\Objeto\Application\ObjetoIndexFinder\ObjetoIndexFinder;
use App\Objeto\Domain\Objetos;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

class ObjetoIndexFinderTest extends ObjetoModuleUnitCase
{
    /** @test */
    public function devuelve_recientes()
    {
        $objeto = ObjetoMother::create();
        $objetos = new Objetos([$objeto]);

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);

        $this->shouldSearchRecent($objetos);

        $this->repository()->searchRecent();
    }
}