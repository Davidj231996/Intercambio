<?php

namespace App\Tests\Intercambio\Infrastructure\Persistence;

use App\Intercambio\Domain\Intercambios;
use App\Tests\Intercambio\Domain\IntercambioMother;
use App\Tests\Intercambio\IntercambioModuleInfraestructureTestCase;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\IdMother;

class IntercambioRepositoryTest extends IntercambioModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $this->repository()->save($intercambio);
    }

    /** @test */
    public function borra_intercambio()
    {
        $intercambio = IntercambioMother::new();

        $this->repository()->save($intercambio);

        $id = $intercambio->id();

        $this->repository()->delete($intercambio);

        self::assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_intercambio_existente()
    {
        $intercambio = IntercambioMother::new();

        $this->repository()->save($intercambio);

        self::assertEquals($this->repository()->search($intercambio->id()), $intercambio);
    }

    /** @test */
    public function no_devuelve_intercambio()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }
}