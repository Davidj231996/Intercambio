<?php

namespace App\Tests\Imagen\Application\Update;

use App\Imagen\Application\Update\ImagenUpdate;
use App\Tests\Imagen\Domain\ImagenMother;
use App\Tests\Imagen\ImagenModuleUnitCase;

class ImagenUpdateTest extends ImagenModuleUnitCase
{
    private ImagenUpdate $update;

    protected function setUp(): void
    {
        parent::setUp();

        $this->update = new ImagenUpdate($this->repository());
    }

    /** @test */
    public function debe_actualizar_imagen()
    {
        $imagen = ImagenMother::createImagenObjeto();
        $imagen2 = ImagenMother::createImagenObjeto($imagen->id(), $imagen->ruta(), $imagen->objeto(), 'Nueva Descripcion');

        $this->shouldSave($imagen);

        $this->repository()->save($imagen);

        $this->shouldSearch($imagen->id(), $imagen);

        $this->shouldSave($imagen2);

        $this->update->update($imagen->id(), 'Nueva Descripcion');
    }
}