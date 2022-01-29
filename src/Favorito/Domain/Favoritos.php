<?php

namespace App\Favorito\Domain;

use App\Shared\Domain\Collection;

class Favoritos extends Collection
{
    protected function type(): string
    {
        return Favorito::class;
    }
}