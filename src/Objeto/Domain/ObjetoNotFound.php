<?php

namespace App\Objeto\Domain;

use App\Shared\Domain\DomainError;

final class ObjetoNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'objeto_no_encontrado';
    }

    protected function errorMessage(): string
    {
        return 'El objeto ' . $this->id . ' no se ha encontrado.';
    }
}