<?php

namespace App\Tests\Favorito\Application\Create;

use App\Favorito\Application\Create\FavoritoCreate;
use App\Tests\Favorito\Domain\FavoritoMother;
use App\Tests\Favorito\FavoritoModuleUnitCase;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use DateTime;

class FavoritoCreateTest extends FavoritoModuleUnitCase
{
    private FavoritoCreate $create;

    protected function setUp(): void
    {
        parent::setUp();

        $this->create = new FavoritoCreate($this->repository());
    }

    /** @test */
    public function debe_crear_favorito()
    {
        $usuario = UsuarioMother::create();
        $objeto = ObjetoMother::create();
        $favorito = FavoritoMother::new(usuario: $usuario, objeto: $objeto, fecha: new DateTime());

        $this->shouldSave($favorito);

        $this->create->create($usuario, $objeto);
    }
}