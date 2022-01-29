<?php

namespace App\Preferencia\Domain;

use App\Shared\Domain\Collection;

class Preferencias extends Collection
{
    protected function type(): string
    {
        return Preferencia::class;
    }
}