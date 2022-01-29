<?php

namespace App\Categoria\Domain;

use App\Shared\Domain\Collection;

class Categorias extends Collection
{

    protected function type(): string
    {
        return Categoria::class;
    }
}