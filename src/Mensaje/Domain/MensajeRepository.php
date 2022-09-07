<?php

namespace App\Mensaje\Domain;

use App\Chat\Domain\Chat;

interface MensajeRepository
{
    public function save(Mensaje $mensaje): void;

    public function search(int $id): ?Mensaje;

    public function searchByChat(Chat $chat): ?Mensajes;
}