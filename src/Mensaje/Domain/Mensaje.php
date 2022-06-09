<?php

namespace App\Mensaje\Domain;

use App\Chat\Domain\Chat;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;

class Mensaje extends Root
{
    public function __construct(
        private ?int $id,
        private Chat $chat,
        private Usuario $usuario,
        private string $mensaje,
        private DateTime $fecha
    ) {}

    public function create(?int $id, Chat $chat, Usuario $usuario, string $mensaje, DateTime $fecha) {
        return new self($id, $chat, $usuario, $mensaje, $fecha);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function chat(): Chat
    {
        return $this->chat;
    }

    public function usuario(): Usuario
    {
        return $this->usuario;
    }

    public function mensaje(): string
    {
        return $this->mensaje;
    }

    public function fecha(): DateTime
    {
        return $this->fecha;
    }
}