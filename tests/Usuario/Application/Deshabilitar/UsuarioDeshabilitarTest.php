<?php

namespace App\Tests\Usuario\Application\Deshabilitar;

use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Domain\Usuario;

class UsuarioDeshabilitarTest extends UsuarioModuleUnitCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function debe_marcar_usuario_deshabilitado()
    {
        $usuario = UsuarioMother::create(estado: Usuario::USUARIO_ACTIVO);

        $usuario->deshabilitar();

        $this->shouldSave($usuario);

        $this->repository()->save($usuario);

        self::assertTrue($usuario->deshabilitado());
    }
}