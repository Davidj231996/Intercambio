<?php

namespace App\Tests\Favorito\Application\Existe;

use App\Favorito\Application\Existe\FavoritoExiste;
use App\Tests\Favorito\Domain\FavoritoMother;
use App\Tests\Favorito\FavoritoModuleUnitCase;

class FavoritoExisteTest extends FavoritoModuleUnitCase
{
    private FavoritoExiste $existe;

    protected function setUp(): void
    {
        parent::setUp();

        $this->existe = new FavoritoExiste($this->repository());
    }

    /** @test */
    public function debe_crear_favorito()
    {
        $favorito = FavoritoMother::new();

        $this->shouldSave($favorito);

        $this->repository()->save($favorito);

        $this->shouldSearchByUsuarioObjeto($favorito->usuario(), $favorito->objeto(), $favorito);

        $this->existe->existe($favorito->usuario(), $favorito->objeto());
    }
}