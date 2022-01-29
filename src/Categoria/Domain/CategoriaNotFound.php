<?php

namespace App\Categoria\Domain;

use App\Shared\Domain\DomainError;

class CategoriaNotFound extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'categoria_no_encontrada';
    }

    protected function errorMessage(): string
    {
        return 'La categoría ' . $this->id . ' no se ha encontrado.';
    }
}