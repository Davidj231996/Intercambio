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
    /** @test */
    public function borra_un_objeto_existente()
    {
        $objeto = ObjetoMother::create();

        $this->shouldDelete($objeto);
        $this->repository()->delete($objeto);
    }
}