<?php

namespace App\Mensaje\Domain;

interface MensajeRepository
{
    public function save(Mensaje $mensaje): void;

    public function search(int $id): ?Mensaje;
}