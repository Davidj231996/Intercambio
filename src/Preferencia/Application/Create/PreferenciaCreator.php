<?php

namespace App\Preferencia\Application\Create;

use App\Categoria\Domain\Categoria;
use App\Preferencia\Domain\Preferencia;
use App\Preferencia\Domain\PreferenciaRepository;
use App\Usuario\Domain\Usuario;

class PreferenciaCreator
{
    public function __construct(private PreferenciaRepository $repository)
    {}

    public function create(Usuario $usuario, Categoria $categoria): void
    {
        $preferencia = Preferencia::create(null, $usuario, $categoria);
        $this->repository->save($preferencia);
    }
}