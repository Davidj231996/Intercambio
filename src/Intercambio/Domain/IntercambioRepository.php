<?php

namespace App\Intercambio\Domain;

interface IntercambioRepository
{
    public function save(Intercambio $intercambio): void;

    public function delete(Intercambio $intercambio): void;

    public function search(int $id): ?Intercambio;
}