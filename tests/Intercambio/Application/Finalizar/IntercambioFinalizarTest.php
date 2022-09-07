<?php

namespace App\Tests\Intercambio\Application\Finalizar;

use App\Intercambio\Domain\Intercambio;
use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Intercambio\IntercambioModuleUnitCase;
use DateTime;

class IntercambioFinalizarTest extends IntercambioModuleUnitCase
{
    /** @test */
    public function debe_finalizar_intercambio_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $now = new DateTime();
        $intercambio->updateIntercambio(Intercambio::ESTADO_FINALIZADO, $now);

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);

        self::assertEquals($intercambio->estadoIntercambio(), Intercambio::ESTADO_FINALIZADO);
    }

    /** @test */
    public function debe_finalizar_intercambio_intercambiar()
    {
        $intercambio = IntercambioMother::new();

        $now = new DateTime();
        $intercambio->updateIntercambiar(Intercambio::ESTADO_FINALIZADO, $now);

        $this->shouldSave($intercambio);

        $this->repository()->save($intercambio);

        self::assertEquals($intercambio->estadoIntercambiar(), Intercambio::ESTADO_FINALIZADO);
    }
}