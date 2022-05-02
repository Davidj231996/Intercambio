<?php

namespace App\Tests\Objeto\Application\Delete;

use App\Objeto\Application\Delete\ObjetoDelete;
use App\Objeto\Domain\ObjetoNotFound;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;

class ObjetoDeleteTest extends ObjetoModuleUnitCase
{
    private ObjetoDelete $delete;

    public function setUp(): void
    {
        parent::setUp();

        $this->delete = new ObjetoDelete($this->repository());
    }

    /** @test */
    public function borra_un_objeto_existente()
    {
        $objeto = ObjetoMother::create();

        $this->shouldSearch($objeto->id(), $objeto);
        $this->shouldDelete($objeto);

        $this->delete->delete($objeto->id());
    }

    /** @test */
    public function lanza_excepcion_cuando_objeto_no_existe(): void
    {
        $this->expectException(ObjetoNotFound::class);

        $id = IdMother::create();

        $this->shouldSearch($id, null);

        $this->delete->delete($id);
    }
}