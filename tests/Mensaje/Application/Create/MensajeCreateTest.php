<?php

namespace App\Tests\Mensaje\Application\Create;

use App\Tests\Mensaje\Domain\MensajeMother;
use App\Tests\Mensaje\MensajeModuleUnitCase;

class MensajeCreateTest extends MensajeModuleUnitCase
{
    /** @test */
    public function debe_crear_mensaje()
    {
        $mensaje = MensajeMother::new();

        $this->shouldSave($mensaje);

        $this->repository()->save($mensaje);
    }
}