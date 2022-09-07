<?php

namespace App\Tests\Favorito;

use App\Favorito\Domain\FavoritoRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class FavoritoModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): FavoritoRepository
    {
        return $this->service(FavoritoRepository::class);
    }
}