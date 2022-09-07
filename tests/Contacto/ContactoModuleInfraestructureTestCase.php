<?php

namespace App\Tests\Contacto;

use App\Contacto\Domain\ContactoRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class ContactoModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ContactoRepository
    {
        return $this->service(ContactoRepository::class);
    }
}