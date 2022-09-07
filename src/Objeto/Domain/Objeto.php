<?php

declare(strict_types=1);

namespace App\Objeto\Domain;

use App\Intercambio\Domain\Intercambio;
use App\Reserva\Domain\Reserva;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;
use DateTime;
use Doctrine\Common\Collections\Collection;

class Objeto extends Root
{
    public const ESTADO_DESHABILITADO = -1;
    public const ESTADO_PENDIENTE = 0;
    public const ESTADO_RESERVADO = 1;
    public const ESTADO_TRANSFERIDO = 2;

    private ?Collection $imagenes = null;
    private ?Collection $favoritos = null;
    private ?Collection $categorias = null;
    private ?Collection $categoriasIntercambio = null;
    private ?Collection $reservas = null;
    private ?Intercambio $intercambio = null;
    private ?Intercambio $intercambiar = null;
    private ?Reserva $reserva = null;

    public function __construct(
        private ?int     $id,
        private string   $nombre,
        private string   $descripcion,
        private int      $estado,
        private Usuario  $usuario,
        private DateTime $fecha
    )
    {
    }

    public static function create(
        ?int $id, string $nombre, string $descripcion, Usuario $usuario, DateTime $fecha
    ): Objeto
    {
        return new self($id, $nombre, $descripcion, self::ESTADO_DESHABILITADO, $usuario, $fecha);
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

    public function fecha(): DateTime
    {
        return $this->fecha;
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

    public function reserva(): ?Reserva
    {
        return $this->reserva;
    }

    public function update(
        string $nombre, string $descripcion, int $estado
    )
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    public function reservar(Reserva $reserva): void
    {
        $this->estado = self::ESTADO_RESERVADO;
        $this->reserva = $reserva;
    }

    public function transferir(): void
    {
        $this->estado = self::ESTADO_TRANSFERIDO;
    }

    public function pendiente(): void
    {
        $this->estado = self::ESTADO_PENDIENTE;
        $this->reserva = null;
    }

    public function deshabilitar(): void
    {
        $this->estado = self::ESTADO_DESHABILITADO;
    }

    public function reservado(): bool
    {
        return $this->estado() == self::ESTADO_RESERVADO || $this->estado() == self::ESTADO_TRANSFERIDO;
    }

    public function transferido(): bool
    {
        return $this->estado() == self::ESTADO_TRANSFERIDO;
    }

    public function habilitado(): bool
    {
        return $this->estado() != self::ESTADO_DESHABILITADO;
    }
}