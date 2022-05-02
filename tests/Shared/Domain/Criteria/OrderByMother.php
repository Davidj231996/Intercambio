<?php

namespace App\Tests\Shared\Domain\Criteria;

use App\Shared\Domain\Criteria\OrderBy;
use App\Tests\Shared\Domain\WordMother;

class OrderByMother
{
    public static function create(?string $fieldName = null): OrderBy
    {
        return new OrderBy($fieldName ?? WordMother::create());
    }
}