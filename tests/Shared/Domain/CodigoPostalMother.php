<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class CodigoPostalMother
{
    public static function create(): string
    {
        return MotherCreator::random()->countryCode;
    }
}