<?php

namespace App\Tests\Usuario\Application\Create;

use App\Tests\Shared\Domain\DuplicatorMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\Create\UsuarioCreate;

class UsuarioCreateTest extends UsuarioModuleUnitCase
{

    private UsuarioCreate $create;

    public function setUp(): void
    {
        parent::setUp();

        $this->create = new UsuarioCreate($this->repository(), $this->hasher());
    }

    /** @test */
    public function debe_crear_usuario()
    {
        $usuario = UsuarioMother::new();
        $this->hashPassword($usuario, $usuario->password());
        $newHashPassword = $this->hasher()->hashPassword($usuario, $usuario->password());
        $usuarioHash = DuplicatorMother::with($usuario, ['password' => $newHashPassword]);

        $this->hashPassword($usuario, $usuario->password());
        $this->shouldSave($usuarioHash);

        $this->create->create($usuario->alias(), $usuario->nombre(), $usuario->apellidos(), $usuario->telefono(), $usuario->email(), $usuario->password());
    }
}