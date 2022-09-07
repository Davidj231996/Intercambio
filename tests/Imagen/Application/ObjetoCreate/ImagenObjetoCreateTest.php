<?php

namespace App\Tests\Imagen\Application\ObjetoCreate;

use App\Tests\Imagen\Domain\ImagenMother;
use App\Tests\Imagen\ImagenModuleUnitCase;

class ImagenObjetoCreateTest extends ImagenModuleUnitCase
{
    /** @test */
    public function debe_crear_imagen_objeto()
    {
        $imagen = ImagenMother::newImagenObjeto();

        $this->shouldSave($imagen);

        $this->repository()->save($imagen);
    }
}