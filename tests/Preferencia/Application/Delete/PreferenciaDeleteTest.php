<?php

namespace App\Tests\Preferencia\Application\Delete;

use App\Preferencia\Application\Delete\PreferenciaDelete;
use App\Tests\Preferencia\Domain\PreferenciaMother;
use App\Tests\Preferencia\PreferenciaModuleUnitCase;

class PreferenciaDeleteTest extends PreferenciaModuleUnitCase
{
    private PreferenciaDelete $delete;

    public function setUp(): void
    {
        parent::setUp();

        $this->delete = new PreferenciaDelete($this->repository());
    }

    /** @test */
    public function debe_borrar_preferencia()
    {
        $preferencia = PreferenciaMother::create();

        $this->shouldSave($preferencia);

        $this->repository()->save($preferencia);

        $this->shouldSearch($preferencia->id(), $preferencia);

        $this->shouldDelete($preferencia);

        $this->delete->delete($preferencia->id());
    }
}