<?php

namespace App\Tests\Objeto\Infrastructure\Persistence;

use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\CategoriaObjeto\Domain\CategoriaObjetoRepository;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Tests\Categoria\Domain\CategoriaMother;
use App\Tests\CategoriaObjeto\Domain\CategoriaObjetoMother;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleInfraestructureTestCase;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class ObjetoRepositoryTest extends ObjetoModuleInfraestructureTestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_objeto()
    {
        $objeto = ObjetoMother::new();

        $this->repository()->save($objeto);
    }

    /** @test */
    public function borra_objeto()
    {
        $objeto = ObjetoMother::new();

        $this->repository()->save($objeto);

        $id = $objeto->id();

        $this->repository()->delete($objeto);

        self::assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_objeto_existente()
    {
        $objeto = ObjetoMother::new();

        $this->repository()->save($objeto);

        self::assertEquals($this->repository()->search($objeto->id()), $objeto);
    }

    /** @test */
    public function no_devuele_objeto()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_objetos_usuario_existente()
    {
        $usuario = UsuarioMother::create();
        $objeto = ObjetoMother::new(usuario: $usuario);
        $objetos = new Objetos([$objeto]);

        $this->repository()->save($objeto);

        self::assertEquals($this->repository()->searchByUsuario($usuario), $objetos);
    }

    /** @test */
    public function devuelve_objetos_habilitados_usuario()
    {
        $usuario = UsuarioMother::create();
        $objeto = ObjetoMother::create(estado: Objeto::ESTADO_PENDIENTE, usuario: $usuario);
        $objetos = new Objetos([$objeto]);

        $this->repository()->save($objeto);

        self::assertEquals($this->repository()->searchHabilitadosByUsuario($usuario), $objetos);
    }

    /** @test */
    public function devuelve_objetos_busqueda()
    {
        $objeto = ObjetoMother::new();
        $objetos = new Objetos([$objeto]);

        $this->repository()->save($objeto);

        self::assertEquals($this->repository()->searchByBusqueda($objeto->nombre()), $objetos);
    }
}