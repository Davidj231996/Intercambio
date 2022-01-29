<?php

namespace App\Tests\Shared\Domain;

use App\Tests\Shared\Infraestructure\Mockery\MatcherIsSimilar;
use App\Tests\Shared\Infraestructure\PhpUnit\Constraint\ConstraintIsSimilar;

class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new ConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new ConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): MatcherIsSimilar
    {
        return new MatcherIsSimilar($value, $delta);
    }
}