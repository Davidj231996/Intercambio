<?php

namespace App\Email\Domain;

use App\Shared\Domain\DomainError;

final class EmailNotSend extends DomainError
{
    public function errorCode(): string
    {
        return 'email_no_enviado';
    }

    protected function errorMessage(): string
    {
        return 'El email no se ha podido enviar.';
    }
}