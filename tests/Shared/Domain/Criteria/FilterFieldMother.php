<?php

namespace App\Tests\Shared\Domain\Criteria;

use App\Shared\Domain\Criteria\FilterField;
use App\Tests\Shared\Domain\WordMother;

class FilterFieldMother
{
    public static function create(?string $fieldName = null): FilterField
    {
        return new FilterField($fieldName ?? WordMother::create());
    }
}