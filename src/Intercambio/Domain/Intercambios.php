<?php

namespace App\Intercambio\Domain;

use App\Shared\Domain\Collection;

class Intercambios extends Collection
{
    protected function type(): string
    {
        return Intercambio::class;
    }
}