<?php

namespace App\Tests\Favorito\Infrastructure\Persistence;

use App\Tests\Favorito\Domain\FavoritoMother;
use App\Tests\Favorito\FavoritoModuleInfraestructureTestCase;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class FavoritoRepositoryTest extends FavoritoModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_favorito()
    {
        $favorito = FavoritoMother::new();

        $this->repository()->save($favorito);
    }

    /** @test */
    public function borra_favorito()
    {
        $favorito = FavoritoMother::create();

        $this->repository()->save($favorito);

        $id = $favorito->id();

        $this->repository()->delete($favorito);

        self::assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_favorito_existente()
    {
        $favorito = FavoritoMother::new();

        $this->repository()->save($favorito);

        self::assertEquals($this->repository()->search($favorito->id()), $favorito);
    }

    /** @test */
    public function no_devuelve_favorito()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_favorito_usuario_objeto()
    {
        $usuario = UsuarioMother::create();
        $objeto = ObjetoMother::create();
        $favorito = FavoritoMother::new(usuario: $usuario, objeto: $objeto);

        $this->repository()->save($favorito);

        self::assertEquals($this->repository()->searchByUsuarioObjeto($usuario, $objeto), $favorito);
    }
}