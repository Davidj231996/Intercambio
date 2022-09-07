<?php

namespace App\Tests\Imagen\Infrastructure\Persistence;

use App\Tests\Imagen\Domain\ImagenMother;
use App\Tests\Imagen\ImagenModuleInfraestructureTestCase;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class ImagenRepositoryTest extends ImagenModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_imagen_usuario()
    {
        $usuario = UsuarioMother::create();
        $imagen = ImagenMother::newImagenUsuario(usuario: $usuario);

        $this->repository()->save($imagen);
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_imagen_objeto()
    {
        $objeto = ObjetoMother::create();
        $imagen = ImagenMother::newImagenObjeto(objeto: $objeto);

        $this->repository()->save($imagen);
    }

    /** @test */
    public function borra_imagen()
    {
        $imagen = ImagenMother::newImagenUsuario();

        $this->repository()->save($imagen);

        $id = $imagen->id();

        $this->repository()->delete($imagen);

        self::assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_imagen_existente()
    {
        $imagen = ImagenMother::newImagenUsuario();

        $this->repository()->save($imagen);

        self::assertEquals($this->repository()->search($imagen->id()), $imagen);
    }

    /** @test */
    public function no_devuelve_imagen()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }
}