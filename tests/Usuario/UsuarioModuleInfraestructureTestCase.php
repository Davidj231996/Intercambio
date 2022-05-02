<?php

namespace App\Tests\Usuario;

use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): UsuarioRepository
    {
        return $this->service(UsuarioRepository::class);
    }
}