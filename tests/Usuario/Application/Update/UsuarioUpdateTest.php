<?php

namespace App\Tests\Usuario\Application\Update;

use App\Tests\Shared\Domain\DuplicatorMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\Update\UsuarioUpdate;
use App\Usuario\Domain\UsuarioNotFound;

class UsuarioUpdateTest extends UsuarioModuleUnitCase
{
    private UsuarioUpdate $update;

    public function setUp(): void
    {
        parent::setUp();

        $this->update = new UsuarioUpdate($this->repository());
    }

    /** @test */
    public function actualiza_usuario_existente()
    {
        $usuario = UsuarioMother::create();
        $newName = WordMother::create();
        $newUsuario = DuplicatorMother::with($usuario, ['nombre' => $newName]);


        $this->shouldSearch($usuario->id(), $usuario);
        $this->shouldSave($newUsuario);

        $this->update->update($usuario->id(), $usuario->alias(), $newName, $usuario->apellidos(), $usuario->telefono(), $usuario->email());
    }

    /** @test */
    public function lanza_excepcion_de_no_encontrar_usuario()
    {
        $this->expectException(UsuarioNotFound::class);

        $id = -1;

        $this->shouldSearch($id, null);

        $this->update->update($id, WordMother::create(), WordMother::create(), WordMother::create(), WordMother::create(), WordMother::create());
    }
}