<?php

namespace App\Usuario\Domain;

use App\Shared\Domain\DomainError;

final class UsuarioNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'usuario_no_encontrado';
    }

    protected function errorMessage(): string
    {
        return 'El usuario ' . $this->id . ' no se ha encontrado.';
    }
}