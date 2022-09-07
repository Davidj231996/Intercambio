<?php

namespace App\Reserva\Domain;

interface ReservaRepository
{
    public function save(Reserva $reserva): void;

    public function delete(Reserva $reserva): void;

    public function search(int $id): ?Reserva;

    public function searchByUsuario(int $usuarioId): ?Reservas;

    public function searchByObjeto(int $objetoId): ?Reservas;
}