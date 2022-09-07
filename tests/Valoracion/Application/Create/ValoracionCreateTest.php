<?php

namespace App\Tests\Valoracion\Application\Create;

use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Valoracion\Domain\ValoracionMother;
use App\Tests\Valoracion\ValoracionModuleUnitCase;
use App\Valoracion\Application\Create\ValoracionCreate;

class ValoracionCreateTest extends ValoracionModuleUnitCase
{
    private ValoracionCreate $create;

    public function setUp(): void
    {
        parent::setUp();

        $this->create = new ValoracionCreate($this->repository());
    }

    /** @test */
    public function debe_realizar_media_valoracion()
    {
        $usuario = UsuarioMother::create();
        $valoracion = ValoracionMother::new($usuario, 3);

        $this->shouldSave($valoracion);

        $this->create->create($usuario, 3);
    }
}