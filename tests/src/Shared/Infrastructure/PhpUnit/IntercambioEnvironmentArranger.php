<?php

namespace App\Tests\intercambio\Shared\Infrastructure\PhpUnit;

use App\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use App\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;


class IntercambioEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}