<?php

namespace App\Direccion\Domain;

use App\Shared\Domain\DomainError;

class DireccionNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'direccion_no_encontrada';
    }

    protected function errorMessage(): string
    {
        return 'La direccion ' . $this->id . ' no se ha encontrado.';
    }
}