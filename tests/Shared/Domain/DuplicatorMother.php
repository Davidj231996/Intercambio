<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

use ReflectionObject;
use ReflectionProperty;
use function Lambdish\Phunctional\each;

class DuplicatorMother
{
    public static function with($object, array $newParams): mixed
    {
        $duplicated = clone $object;
        $reflection = new ReflectionObject($duplicated);

        each(
            static function (ReflectionProperty $property) use ($duplicated, $newParams) {
                if (isset($newParams[$property->getName()])) {
                    $property->setAccessible(true);
                    $property->setValue($duplicated, $newParams[$property->getName()]);
                }
            },
            $reflection->getProperties()
        );

        return $duplicated;
    }
}