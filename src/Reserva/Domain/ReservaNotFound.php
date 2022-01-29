<?php

namespace App\Reserva\Domain;

use App\Shared\Domain\DomainError;

class ReservaNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'reserva_no_encontrada';
    }

    protected function errorMessage(): string
    {
        return 'La reserva ' . $this->id . ' no se ha encontrado.';
    }
}