<?php

namespace App\Mensaje\Domain;

use App\Shared\Domain\Collection;

final class Mensajes extends Collection
{
    protected function type(): string
    {
        return Mensaje::class;
    }
}