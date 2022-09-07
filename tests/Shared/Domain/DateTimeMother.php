<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

use DateTime;

class DateTimeMother
{
    public static function create(): DateTime
    {
        return MotherCreator::random()->dateTime;
    }
}