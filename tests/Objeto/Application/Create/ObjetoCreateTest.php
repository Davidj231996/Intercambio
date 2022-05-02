<?php

namespace App\Tests\Objeto\Application\Create;

use App\Objeto\Application\Create\ObjetoCreate;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

final class ObjetoCreateTest extends ObjetoModuleUnitCase
{
    private ObjetoCreate $create;

    protected function setUp(): void
    {
        parent::setUp();

        $this->create = new ObjetoCreate($this->repository());
    }

    /** @test */
    public function crea_un_objeto_valido()
    {
        $objeto = ObjetoMother::new();

        $this->shouldSave($objeto);

        $this->create->create($objeto->nombre(), $objeto->descripcion(), $objeto->usuario());
    }
}