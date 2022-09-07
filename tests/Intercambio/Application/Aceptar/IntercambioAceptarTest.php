<?php

namespace App\Tests\Intercambio\Application\Aceptar;

use App\Intercambio\Domain\Intercambio;
use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Intercambio\IntercambioModuleUnitCase;
use DateTime;

class IntercambioAceptarTest extends IntercambioModuleUnitCase
{
    /** @test */
    public function debe_aceptar_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_ACEPTADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_ACEPTADO, $now);

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);

        self::assertTrue($intercambio->aceptadoIntercambiar());
        self::assertTrue($intercambio->aceptadoIntercambio());
    }
}