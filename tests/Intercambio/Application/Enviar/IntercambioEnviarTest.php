<?php

namespace App\Tests\Intercambio\Application\Enviar;

use App\Intercambio\Domain\Intercambio;
use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Intercambio\IntercambioModuleUnitCase;
use DateTime;

class IntercambioCancelarTest extends IntercambioModuleUnitCase
{
    /** @test */
    public function debe_enviar_intercambio_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_ENVIADO, $now);

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);

        self::assertEquals($intercambio->estadoIntercambio(), Intercambio::ESTADO_ENVIADO);
    }

    /** @test */
    public function debe_enviar_intercambio_intercambiar()
    {
        $intercambio = IntercambioMother::new();

        $now = new DateTime();
        $intercambio->updateIntercambiar(Intercambio::ESTADO_ENVIADO, $now);

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);

        self::assertEquals($intercambio->estadoIntercambiar(), Intercambio::ESTADO_ENVIADO);
    }
}