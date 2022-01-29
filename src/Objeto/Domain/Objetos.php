<?php

namespace App\Objeto\Domain;

use App\Shared\Domain\Collection;

final class Objetos extends Collection
{
    protected function type(): string
    {
        return Objeto::class;
    }
}