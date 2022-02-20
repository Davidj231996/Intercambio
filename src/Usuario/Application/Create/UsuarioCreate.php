<?php


declare(strict_types=1);

namespace App\Usuario\Application\Create;

use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UsuarioCreate
{
    public function __construct(private UsuarioRepository $repository, private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function create($alias, $nombre, $apellidos, $telefono, $email, $password): Usuario
    {
        $usuario = Usuario::create(null, $alias, $nombre, $apellidos, $telefono, $email, $password);
        $usuario->setPassword($this->passwordHasher->hashPassword($usuario, $usuario->password()));

        $this->repository->save($usuario);
        return $usuario;
    }

}