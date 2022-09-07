<?php

namespace App\Tests\Contacto\Application\Create;

use App\Tests\Contacto\ContactoModuleUnitCase;
use App\Tests\Contacto\Domain\ContactoMother;

class ContactoCreateTest extends ContactoModuleUnitCase
{
    /** @test */
    public function debe_crear_contacto()
    {
        $contacto = ContactoMother::new();

        $this->shouldSave($contacto);

        $this->repository()->save($contacto);
    }
}