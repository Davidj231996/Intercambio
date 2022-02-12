<?php

declare(strict_types=1);

namespace App\Usuario\Domain;

use App\Direccion\Domain\Direccion;
use App\Shared\Domain\Root\Root;
use App\Valoracion\Domain\Valoracion;
use Doctrine\Common\Collections\Collection;

class Usuario extends Root
{
    private ?Valoracion $valoracion = null;
    private ?Direccion $direccion = null;
    private ?Collection $objetos = null;
    private ?Collection $preferencias = null;
    private ?Collection $favoritos = null;
    private ?Collection $reservas = null;

    public function __construct(
        private int    $id,
        private string $alias,
        private string $nombre,
        private string $apellidos,
        private string $telefono,
        private string $email,
        private string $password
    )
    {
    }

    public static function create(
        int    $id,
        string $alias,
        string $nombre,
        string $apellidos,
        string $telefono,
        string $email,
        string $password
    ): Usuario
    {
        return new self($id, $alias, $nombre, $apellidos, $telefono, $email, $password);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function alias(): string
    {
        return $this->alias;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function apellidos(): string
    {
        return $this->apellidos;
    }

    public function telefono(): string
    {
        return $this->telefono;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function objetos(): ?Collection
    {
        return $this->objetos;
    }

    public function valoracion(): ?Valoracion
    {
        return $this->valoracion;
    }

    public function direccion(): Direccion
    {
        return $this->direccion;
    }

    public function preferencias(): Collection
    {
        return $this->preferencias;
    }

    public function favoritos(): Collection
    {
        return $this->favoritos;
    }

    public function reservas(): Collection
    {
        return $this->reservas;
    }


    public function update(
        string $alias,
        string $nombre,
        string $apellidos,
        string $telefono,
        string $email,
        string $password
    ): void
    {
        $this->alias = $alias;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->password = $password;
    }
}