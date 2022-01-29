<?php

namespace App\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Stringable;

class Uuid implements Stringable
{
    public function __construct(protected int $value)
    {
        $this->ensureIsValidUuid($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return strval($this->value());
    }

    private function ensureIsValidUuid(int $value): void
    {
        if (!is_int($value)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%d>.', static::class, $value));
        }
    }
}