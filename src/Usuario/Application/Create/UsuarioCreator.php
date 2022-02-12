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

    public function create(string $alias, string $nombre, string $apellidos, string $telefono, string $email, string $password): void
    {
        $usuario = Usuario::create(null, $alias, $nombre, $apellidos, $telefono, $email, $password);
        $usuario->setPassword($this->passwordHasher->hashPassword($usuario, $password));

        $this->repository->save($usuario);
    }

}