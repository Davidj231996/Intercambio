<?php

namespace App\Contacto\Domain;

use App\Shared\Domain\DomainError;

class ContactoNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'contacto_no_encontrado';
    }

    protected function errorMessage(): string
    {
        return 'El contacto ' . $this->id . ' no se ha encontrado.';
    }
}