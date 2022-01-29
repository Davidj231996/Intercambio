<?php

namespace App\Shared\Domain\ValueObject;

class IntValueObject
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }
}