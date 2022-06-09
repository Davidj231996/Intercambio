<?php

namespace App\Chat\Domain;

use App\Shared\Domain\DomainError;

class ChatNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'chat_no_encontrado';
    }

    protected function errorMessage(): string
    {
        return 'El chat ' . $this->id . ' no se ha encontrado.';
    }
}