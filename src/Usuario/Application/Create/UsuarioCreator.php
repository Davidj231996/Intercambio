<?php


declare(strict_types=1);

namespace App\Usuario\Application\Create;

use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UsuarioCreator
{
    public function __construct(private UsuarioRepository $repository, private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function create(array $usuarioRequest): Usuario
    {
        $usuario = Usuario::create(null, $usuarioRequest['alias'], $usuarioRequest['nombre'], $usuarioRequest['apellidos'], $usuarioRequest['telefono'], $usuarioRequest['email'], $usuarioRequest['password']);
        $usuario->setPassword($this->passwordHasher->hashPassword($usuario, $usuario->password()));

        $this->repository->save($usuario);
        return $usuario;
    }

}