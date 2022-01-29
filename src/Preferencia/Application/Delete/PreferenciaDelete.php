<?php

namespace App\Preferencia\Application\Delete;

use App\Preferencia\Domain\PreferenciaRepository;

class PreferenciaDelete
{
    public function __construct(private PreferenciaRepository $repository)
    {}

    public function delete(int $id): void
    {
        $preference = $this->repository->search($id);
        $this->repository->delete($preference);
    }
}