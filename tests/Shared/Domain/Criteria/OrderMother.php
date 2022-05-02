<?php

namespace App\Tests\Shared\Domain\Criteria;

use App\Shared\Domain\Criteria\Order;
use App\Shared\Domain\Criteria\OrderBy;
use App\Shared\Domain\Criteria\OrderType;

class OrderMother
{
    public static function create(?OrderBy $orderBy = null, ?OrderType $orderType = null): Order
    {
        return new Order($orderBy ?? OrderByMother::create(), $orderType ?? OrderType::random());
    }

    public static function none(): Order
    {
        return Order::none();
    }
}