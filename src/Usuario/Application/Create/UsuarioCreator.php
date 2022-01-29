<?php


declare(strict_types=1);

namespace App\Usuario\Application\Create;

use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;

final class UsuarioCreator
{
    public function __construct(private UsuarioRepository $repository)
    {
    }

    public function create(int $id, string $alias, string $nombre, string $apellidos, string $telefono, string $email, string $password): void
    {
        $usuario = Usuario::create($id, $alias, $nombre, $apellidos, $telefono, $email, $password);

        $this->repository->save($usuario);
    }

}