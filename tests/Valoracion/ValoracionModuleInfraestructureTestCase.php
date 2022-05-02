<?php

namespace App\Tests\Valoracion;

use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;
use App\Valoracion\Domain\ValoracionRepository;

class ValoracionModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ValoracionRepository
    {
        return $this->service(ValoracionRepository::class);
    }
}