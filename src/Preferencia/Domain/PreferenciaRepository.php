<?php

namespace App\Preferencia\Domain;

interface PreferenciaRepository
{
    public function save(Preferencia $preferencia): void;

    public function delete(Preferencia $preferencia): void;

    public function search(int $id): ?Preferencia;
}