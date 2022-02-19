<?php

namespace App\Usuario\Application\Check;

use App\Usuario\Domain\Usuario;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioCheck
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {}

    public function check(Usuario $usuario, $password): bool
    {
        return $this->passwordHasher->isPasswordValid($usuario, $password);
    }
}