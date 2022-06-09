<?php

namespace App\Chat\Domain;

use App\Usuario\Domain\Usuario;

interface ChatRepository
{
    public function save(Chat $chat): void;

    public function search(int $id): ?Chat;

    public function searchByUsuario(Usuario $usuario): ?Chats;
}