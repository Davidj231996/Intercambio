<?php

namespace App\Preferencia\Domain;

use App\Shared\Domain\DomainError;

class PreferenciaNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'preferencia_no_encontrada';
    }

    protected function errorMessage(): string
    {
        return 'La preferencia ' . $this->id . ' no se ha encontrado.';
    }
}