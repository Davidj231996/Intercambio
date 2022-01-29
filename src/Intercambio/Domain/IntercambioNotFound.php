<?php

namespace App\Intercambio\Domain;

use App\Shared\Domain\DomainError;

class IntercambioNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'intercambio_no_encontrado';
    }

    protected function errorMessage(): string
    {
        return 'El intercambio ' . $this->id . ' no se ha encontrado.';
    }
}