<?php

namespace App\Tests\Imagen;

use App\Imagen\Domain\ImagenRepository;
use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class ImagenModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ImagenRepository
    {
        return $this->service(ImagenRepository::class);
    }
}