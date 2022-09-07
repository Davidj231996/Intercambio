<?php

namespace App\Contacto\Domain;

use App\Shared\Domain\Collection;

final class Contactos extends Collection
{
    protected function type(): string
    {
        return Contacto::class;
    }
}