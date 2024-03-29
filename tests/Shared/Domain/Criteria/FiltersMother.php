<?php

namespace App\Tests\Shared\Domain\Criteria;

use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\Filters;

class FiltersMother
{
    /** @param Filter[] $filters */
    public static function create(array $filters): Filters
    {
        return new Filters($filters);
    }

    public static function createOne(Filter $filter): Filters
    {
        return self::create([$filter]);
    }

    public static function blank(): Filters
    {
        return self::create([]);
    }
}