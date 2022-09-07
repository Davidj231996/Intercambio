<?php

namespace App\Contacto\Domain;

interface ContactoRepository
{
    public function save(Contacto $contacto): void;

    public function search(int $id): ?Contacto;

    public function searchContestados(): ?Contactos;

    public function searchNoContestados(): ?Contactos;
}