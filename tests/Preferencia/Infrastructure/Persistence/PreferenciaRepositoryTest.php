<?php

namespace App\Tests\Preferencia\Infrastructure\Persistence;

use App\Tests\Preferencia\Domain\PreferenciaMother;
use App\Tests\Preferencia\PreferenciaModuleInfraestructureTestCase;
use App\Tests\Shared\Domain\IdMother;

class PreferenciaRepositoryTest extends PreferenciaModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_preferencia()
    {
        $preferencia = PreferenciaMother::new();

        $this->repository()->save($preferencia);
    }

    /**
     * @test
     */
    public function borra_preferencia()
    {
        $preferencia = PreferenciaMother::new();

        $this->repository()->save($preferencia);

        $id = $preferencia->id();

        $this->repository()->delete($preferencia);

        $this->assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_preferencia_existente()
    {
        $preferencia = PreferenciaMother::new();

        $this->repository()->save($preferencia);

        $this->assertEquals($this->repository()->search($preferencia->id()), $preferencia);
    }

    /** @test */
    public function devuelve_una_reserva_que_no_existe(): void
    {
        $this->assertNull($this->repository()->search(IdMother::create()));
    }
}