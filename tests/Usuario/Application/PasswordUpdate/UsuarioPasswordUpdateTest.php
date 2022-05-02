<?php

namespace App\Tests\Usuario\Application\PasswordUpdate;

use App\Tests\Shared\Domain\DuplicatorMother;
use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\PasswordUpdate\UsuarioPasswordUpdate;

class UsuarioPasswordUpdateTest extends UsuarioModuleUnitCase
{
    private UsuarioPasswordUpdate $passwordUpdate;

    public function setUp(): void
    {
        parent::setUp();

        $this->passwordUpdate = new UsuarioPasswordUpdate($this->repository(), $this->hasher());
    }

    /** @test */
    public function actualiza_password()
    {
        $usuario = UsuarioMother::create();
        $newPassword = WordMother::create();
        $this->hashPassword($usuario, $newPassword);
        $newHashPassword = $this->hasher()->hashPassword($usuario, $newPassword);
        $newUsuario = DuplicatorMother::with($usuario, ['password' => $newHashPassword]);

        $this->hashPassword($usuario, $newPassword);
        $this->shouldSave($newUsuario);

        $this->passwordUpdate->updatePassword($usuario, $newPassword);
    }
}