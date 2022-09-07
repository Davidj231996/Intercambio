<?php

namespace App\Tests\Intercambio\Application\Cancelar;

use App\Intercambio\Domain\Intercambio;
use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Intercambio\IntercambioModuleUnitCase;
use DateTime;

class IntercambioCancelarTest extends IntercambioModuleUnitCase
{
    /** @test */
    public function debe_cancelar_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_CANCELADO, $now);
        $intercambio->updateIntercambiar(Intercambio::ESTADO_CANCELADO, $now);

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);

        self::assertTrue($intercambio->canceladoIntercambiar());
        self::assertEquals($intercambio->estadoIntercambio(), Intercambio::ESTADO_CANCELADO);
    }
}