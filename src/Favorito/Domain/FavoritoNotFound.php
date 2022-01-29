<?php

namespace App\Favorito\Domain;

use App\Shared\Domain\DomainError;

class FavoritoNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'favorito_no_encontrado';
    }

    protected function errorMessage(): string
    {
        return 'El favorito ' . $this->id . ' no se ha encontrado.';
    }
}