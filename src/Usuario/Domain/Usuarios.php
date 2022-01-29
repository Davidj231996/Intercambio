<?php

namespace App\Usuario\Domain;

use App\Shared\Domain\Collection;

final class Usuarios extends Collection
{
    protected function type(): string
    {
        return Usuario::class;
    }
}