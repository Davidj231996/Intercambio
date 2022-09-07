<?php

namespace App\Tests\Imagen\Application\Delete;

use App\Imagen\Application\Delete\ImagenDelete;
use App\Tests\Imagen\Domain\ImagenMother;
use App\Tests\Imagen\ImagenModuleUnitCase;

class ImagenDeleteTest extends ImagenModuleUnitCase
{
    private ImagenDelete $imagenDelete;

    protected function setUp(): void
    {
        parent::setUp();

        $this->imagenDelete = new ImagenDelete($this->repository());
    }

    /** @test */
    public function debe_borrar_imagen()
    {
        $imagen = ImagenMother::createImagenUsuario();

        $this->shouldSave($imagen);

        $this->repository()->save($imagen);

        $this->shouldSearch($imagen->id(), $imagen);

        $this->shouldDelete($imagen);

        $this->imagenDelete->delete($imagen->id());
    }
}