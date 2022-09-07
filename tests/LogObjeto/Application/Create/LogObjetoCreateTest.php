<?php

namespace App\Tests\LogObjeto\Application\Create;

use App\Tests\LogObjeto\Domain\LogObjetoMother;
use App\Tests\LogObjeto\LogObjetoModuleUnitCase;

class LogObjetoCreateTest extends LogObjetoModuleUnitCase
{
    /** @test */
    public function debe_crear_log_objeto()
    {
        $log = LogObjetoMother::new();

        $this->shouldSave($log);

        $this->repository()->save($log);
    }
}