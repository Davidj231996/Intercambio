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
    private ObjetoUpdate $update;

    protected function setUp(): void
    {
        parent::setUp();

        $this->update = new ObjetoUpdate($this->repository());
    }

    /** @test */
    public function actualiza_un_objeto_existente(): void
    {
        $objeto = ObjetoMother::create();
        $newName = WordMother::create();
        $objetoEditado = DuplicatorMother::with($objeto, ['nombre' => $newName]);

        $this->shouldSearch($objeto->id(), $objeto);
        $this->shouldSave($objetoEditado);

        $this->update->update($objeto->id(), $newName, $objeto->descripcion(), $objeto->estado());
    }

    /** @test */
    public function lanza_excepcion_cuando_objeto_no_existe(): void
    {
        $this->expectException(ObjetoNotFound::class);

        $id = -1;

        $this->shouldSearch($id, null);

        $this->update->update($id, WordMother::create(), WordMother::create(), 0);
    }
}