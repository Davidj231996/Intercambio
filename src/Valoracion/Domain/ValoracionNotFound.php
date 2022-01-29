<?php

namespace App\Valoracion\Domain;

use App\Shared\Domain\DomainError;

class ValoracionNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'valoracion_no_encontrada';
    }

    protected function errorMessage(): string
    {
        return 'La valoración del usuario ' . $this->id . ' no se ha encontrado.';
    }
}