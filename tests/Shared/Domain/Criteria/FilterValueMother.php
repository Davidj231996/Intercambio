<?php

namespace App\Tests\Shared\Domain\Criteria;

use App\Shared\Domain\Criteria\FilterValue;
use App\Tests\Shared\Domain\WordMother;

class FilterValueMother
{
    public static function create(?string $value = null): FilterValue
    {
        return new FilterValue($value ?? WordMother::create());
    }
}