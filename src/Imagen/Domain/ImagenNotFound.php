<?php

namespace App\Imagen\Domain;

use App\Shared\Domain\DomainError;

class ImagenNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'imagen_no_encontrada';
    }

    protected function errorMessage(): string
    {
        return 'La imagen ' . $this->id . ' no se ha encontrado.';
    }
}