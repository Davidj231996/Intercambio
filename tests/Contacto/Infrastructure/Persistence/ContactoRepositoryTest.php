<?php

namespace App\Tests\Contacto\Infrastructure\Persistence;

use App\Contacto\Domain\Contacto;
use App\Contacto\Domain\Contactos;
use App\Tests\Contacto\ContactoModuleInfraestructureTestCase;
use App\Tests\Contacto\Domain\ContactoMother;
use App\Tests\Shared\Domain\IdMother;

class ContactoRepositoryTest extends ContactoModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_contacto()
    {
        $contacto = ContactoMother::new();

        $this->repository()->save($contacto);
    }

    /** @test */
    public function devuelve_contacto_existente()
    {
        $contacto = ContactoMother::new();

        $this->repository()->save($contacto);

        self::assertEquals($this->repository()->search($contacto->id()), $contacto);
    }

    /** @test */
    public function no_devuelve_contacto()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_contactos_contestado()
    {
        $contacto = ContactoMother::create(estado: Contacto::ESTADO_CONTESTADO);
        $contactos = new Contactos([$contacto]);

        $this->repository()->save($contacto);

        self::assertEquals($this->repository()->searchContestados(), $contactos);
    }

    /** @test */
    public function devuelve_contactos_no_contestado()
    {
        $contacto = ContactoMother::new();
        $contactos = new Contactos([$contacto]);

        $this->repository()->save($contacto);

        self::assertEquals($this->repository()->searchNoContestados(), $contactos);
    }
}