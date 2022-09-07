<?php

namespace App\Tests\Intercambio\Application\Create;

use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Intercambio\IntercambioModuleUnitCase;

class IntercambioCreateTest extends IntercambioModuleUnitCase
{
    /** @test */
    public function debe_crear_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);
    }
}