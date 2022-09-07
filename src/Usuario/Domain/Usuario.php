<?php

declare(strict_types=1);

namespace App\Usuario\Domain;

use App\Direccion\Domain\Direccion;
use App\Imagen\Domain\Imagen;
use App\Shared\Domain\Root\Root;
use App\Valoracion\Domain\Valoracion;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Usuario extends Root implements UserInterface, PasswordAuthenticatedUserInterface
{
    public const USUARIO_ACTIVO = 1;
    public const USUARIO_INACTIVO = 0;

    public const USUARIO_ADMIN = 'admin';

    private ?Valoracion $valoracion = null;
    private ?Direccion $direccion = null;
    private ?Imagen $imagen = null;
    private ?Collection $objetos = null;
    private ?Collection $preferencias = null;
    private ?Collection $favoritos = null;
    private ?Collection $reservas = null;
    private ?Collection $reservasAMi = null;
    private ?Collection $intercambios = null;
    private ?Collection $intercambiosAMi = null;
    private ?Collection $misChats = null;
    private ?Collection $chats = null;
    private int $chatsSinLeer = 0;

    private $roles = [];

    public function __construct(
        private ?int   $id,
        private string $alias,
        private string $nombre,
        private string $apellidos,
        private string $telefono,
        private string $email,
        private string $password,
        private int    $estado
    )
    {
    }

    public static function create(
        ?int   $id,
        string $alias,
        string $nombre,
        string $apellidos,
        string $telefono,
        string $email,
        string $password
    ): Usuario
    {
        return new self($id, $alias, $nombre, $apellidos, $telefono, $email, $password, self::USUARIO_INACTIVO);
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

    public function estado(): int
    {
        return $this->estado;
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

    public function imagen(): ?Imagen
    {
        return $this->imagen;
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

    public function reservasAMi(): Collection
    {
        return $this->reservasAMi;
    }

    public function intercambios(): Collection
    {
        return $this->intercambios;
    }

    public function intercambiosAMi(): Collection
    {
        return $this->intercambiosAMi;
    }

    public function misChats(): Collection
    {
        return $this->misChats;
    }

    public function chats(): Collection
    {
        return $this->chats;
    }

    public function chatsSinLeer(): int
    {
        return $this->chatsSinLeer;
    }

    public function update(
        string $nombre,
        string $apellidos,
        string $telefono,
        string $email
    ): void
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function habilitar(): void
    {
        $this->estado = self::USUARIO_ACTIVO;
    }

    public function deshabilitar(): void
    {
        $this->estado = self::USUARIO_INACTIVO;
    }

    public function deshabilitado(): bool
    {
        return $this->estado() == self::USUARIO_INACTIVO;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->alias;
    }

    public function updateLeido(): void
    {
        $this->chatsSinLeer = $this->chatsSinLeer - 1;
    }

    public function updateNoLeido(): void
    {
        $this->chatsSinLeer = $this->chatsSinLeer + 1;
    }
}