<?php

declare(strict_types=1);

namespace App\Objeto\Domain;

use App\Intercambio\Domain\Intercambio;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use Doctrine\Common\Collections\Collection;

class Objeto extends Root
{
    private ?Collection $imagenes = null;
    private ?Collection $favoritos = null;
    private ?Collection $categorias = null;
    private ?Collection $categoriasIntercambio = null;
    private ?Collection $reservas = null;
    private ?Intercambio $intercambio = null;
    private ?Intercambio $intercambiar = null;

    public function __construct(
        private int $id,
        private string $nombre,
        private string $descripcion,
        private int $estado,
        private Usuario $usuario
    )
    {
    }

    public static function create(
        int $id, string $nombre, string $descripcion, int $estado, Usuario $usuario
    ) : Objeto
    {
        return new self($id, $nombre, $descripcion, $estado, $usuario);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function descripcion(): string
    {
        return $this->descripcion;
    }

    public function estado(): int
    {
        return $this->estado;
    }

    public function usuario(): Usuario
    {
        return $this->usuario;
    }

    public function imagenes(): ?Collection
    {
        return $this->imagenes;
    }

    public function favoritos(): ?Collection
    {
        return $this->favoritos;
    }

    public function categorias(): ?Collection
    {
        return $this->categorias;
    }

    public function categoriasIntercambio(): ?Collection
    {
        return $this->categoriasIntercambio;
    }

    public function reservas(): ?Collection
    {
        return $this->reservas;
    }

    public function intercambio(): ?Intercambio
    {
        return $this->intercambio;
    }

    public function intercambiar(): ?Intercambio
    {
        return $this->intercambiar;
    }

    public function update(
        string $nombre, string $descripcion, int $estado, Usuario $usuario
    )
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->usuario = $usuario;
    }
}