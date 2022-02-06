<?php

namespace App\Categoria\Domain;

use App\Shared\Domain\Root\Root;
use Doctrine\Common\Collections\Collection;

class Categoria extends Root
{
    private ?Collection $subcategorias = null;
    private ?Collection $preferencias = null;
    private ?Collection $objetos = null;
    private ?Collection $objetosIntercambio = null;

    public function __construct(
        private int        $id,
        private string     $nombre,
        private string     $descripcion,
        private ?Categoria $categoria
    )
    {
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

    public function categoria(): Categoria
    {
        return $this->categoria;
    }

    public function subcategorias(): Collection
    {
        return $this->subcategorias;
    }

    public function preferencias(): Collection
    {
        return $this->preferencias;
    }

    public function objetos(): Collection
    {
        return $this->objetos;
    }

    public function objetosIntercambio(): Collection
    {
        return $this->objetosIntercambio;
    }
}