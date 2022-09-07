<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class ValorMother
{
    public static function create(): float
    {
        return MotherCreator::random()->randomFloat(2, 0, 5);
    }
}