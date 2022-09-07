<?php

namespace App\Tests\Usuario\Application\Habilitar;

use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Domain\Usuario;

class UsuarioHabilitarTest extends UsuarioModuleUnitCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function debe_marcar_usuario_deshabilitado()
    {
        $usuario = UsuarioMother::create(estado: Usuario::USUARIO_INACTIVO);

        $usuario->habilitar();

        $this->shouldSave($usuario);

        $this->repository()->save($usuario);

        self::assertFalse($usuario->deshabilitado());
    }
}