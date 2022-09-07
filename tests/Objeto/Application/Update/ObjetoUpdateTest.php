<?php

namespace App\Tests\Objeto\Application\Update;

use App\Objeto\Application\Update\ObjetoUpdate;
use App\Objeto\Domain\ObjetoNotFound;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Tests\Shared\Domain\DuplicatorMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;

final class ObjetoUpdateTest extends ObjetoModuleUnitCase
{
    /** @test */
    public function actualiza_un_objeto_existente(): void
    {
        $objeto = ObjetoMother::create();
        $newName = WordMother::create();
        $objetoEditado = DuplicatorMother::with($objeto, ['nombre' => $newName]);

        $this->shouldSave($objetoEditado);

        $objeto->update($newName, $objeto->descripcion(), $objeto->estado());

        $this->repository()->save($objeto);
    }
}