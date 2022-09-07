<?php

namespace App\Tests\Favorito\Application\Delete;

use App\Favorito\Application\Delete\FavoritoDelete;
use App\Tests\Favorito\Domain\FavoritoMother;
use App\Tests\Favorito\FavoritoModuleUnitCase;

class FavoritoDeleteTest extends FavoritoModuleUnitCase
{
    private FavoritoDelete $delete;

    protected function setUp(): void
    {
        parent::setUp();

        $this->delete = new FavoritoDelete($this->repository());
    }

    /** @test */
    public function debe_crear_favorito()
    {
        $favorito = FavoritoMother::create();

        $this->shouldSave($favorito);

        $this->repository()->save($favorito);

        $this->shouldSearch($favorito->id(), $favorito);

        $this->shouldDelete($favorito);

        $this->delete->delete($favorito->id());
    }
}