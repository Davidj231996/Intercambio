<?php

namespace App\Usuario\Application\PasswordUpdate;

use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioPasswordUpdate
{
    public function __construct(private UsuarioRepository $repository, private UserPasswordHasherInterface $passwordHasher)
    {}

    public function updatePassword(Usuario $usuario, $password)
    {
        $usuario->setPassword($this->passwordHasher->hashPassword($usuario, $password));
        $this->repository->save($usuario);
    }
}