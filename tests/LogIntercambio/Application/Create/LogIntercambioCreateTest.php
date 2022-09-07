<?php

namespace App\Tests\LogIntercambio\Application\Create;

use App\Tests\LogIntercambio\Domain\LogIntercambioMother;
use App\Tests\LogIntercambio\LogIntercambioModuleUnitCase;

class LogIntercambioCreateTest extends LogIntercambioModuleUnitCase
{
    /** @test */
    public function debe_crear_log_intercambio()
    {
        $log = LogIntercambioMother::new();

        $this->shouldSave($log);

        $this->repository()->save($log);
    }
}