<?php

namespace App\Tests\Preferencia;

use App\Preferencia\Domain\PreferenciaRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class PreferenciaModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): PreferenciaRepository
    {
        return $this->service(PreferenciaRepository::class);
    }
}