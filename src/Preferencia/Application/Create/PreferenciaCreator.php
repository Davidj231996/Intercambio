<?php

namespace App\Preferencia\Application\Create;

use App\Preferencia\Domain\Preferencia;
use App\Preferencia\Domain\PreferenciaRepository;

class PreferenciaCreator
{
    public function __construct(private PreferenciaRepository $repository)
    {}

    public function create(int $id, int $usuarioId, int $categoriaId): void
    {
        $preferencia = Preferencia::create($id, $usuarioId, $categoriaId);
        $this->repository->save($preferencia);
    }
}