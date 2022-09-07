<?php

namespace App\Tests\Contacto\Application\Responder;

use App\Tests\Contacto\ContactoModuleUnitCase;
use App\Tests\Contacto\Domain\ContactoMother;

class ContactoResponderTest extends ContactoModuleUnitCase
{
    /** @test */
    public function debe_responder_contacto()
    {
        $contacto = ContactoMother::new();

        $contacto->responder();

        $this->shouldSave($contacto);

        $this->repository()->save($contacto);
    }
}