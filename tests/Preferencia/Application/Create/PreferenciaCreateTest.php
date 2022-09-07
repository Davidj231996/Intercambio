<?php

namespace App\Tests\Preferencia\Application\Create;

use App\Preferencia\Application\Create\PreferenciaCreate;
use App\Tests\Preferencia\Domain\PreferenciaMother;
use App\Tests\Preferencia\PreferenciaModuleUnitCase;

class PreferenciaCreateTest extends PreferenciaModuleUnitCase
{
    private PreferenciaCreate $create;

    public function setUp(): void
    {
        parent::setUp();

        $this->create = new PreferenciaCreate($this->repository());
    }

    /** @test */
    public function debe_crear_preferencia()
    {
        $preferencia = PreferenciaMother::create();

        $this->shouldSave($preferencia);

        $this->repository()->save($preferencia);
    }
}