<?php

namespace App\Tests\Imagen\Application\UsuarioCreate;

use App\Tests\Imagen\Domain\ImagenMother;
use App\Tests\Imagen\ImagenModuleUnitCase;

class ImagenUsuarioCreateTest extends ImagenModuleUnitCase
{
    /** @test */
    public function debe_crear_imagen_usuario()
    {
        $imagen = ImagenMother::newImagenUsuario();

        $this->shouldSave($imagen);

        $this->repository()->save($imagen);
    }
}