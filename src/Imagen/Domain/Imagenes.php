<?php

namespace App\Imagen\Domain;

use App\Shared\Domain\Collection;

final class Imagenes extends Collection
{
    protected function type(): string
    {
        return Imagen::class;
    }
}