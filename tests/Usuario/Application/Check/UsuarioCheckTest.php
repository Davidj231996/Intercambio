<?php

namespace App\Tests\Usuario\Application\Check;

use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\Check\UsuarioCheck;

class UsuarioCheckTest extends UsuarioModuleUnitCase
{
    private UsuarioCheck $check;

    public function setUp(): void
    {
        parent::setUp();

        $this->check = new UsuarioCheck($this->hasher());
    }

    /** @test */
    public function valida_usuario()
    {
        $usuario = UsuarioMother::create();

        $this->isPasswordValid($usuario, $usuario->password());

        $this->check->check($usuario, $usuario->password());
    }

    /** @test */
    public function no_valida_usuario()
    {
        $usuario = UsuarioMother::create();
        $password = '';

        $this->isPasswordNotValid($usuario, $password);

        $this->check->check($usuario, $password);
    }
}