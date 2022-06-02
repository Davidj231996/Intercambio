<?php

namespace App\Objeto\Application\ReservadoUsuario;

use App\Objeto\Domain\Objeto;
use App\Reserva\Domain\Reserva;
use App\Usuario\Domain\Usuario;

class ObjetoReservadoUsuario
{
    public function __construct()
    {
    }

    public function estaReservado(Objeto $objeto, Usuario $usuario): bool
    {
        if ($objeto->usuario() != $usuario && !$objeto->reservado() && !empty($objeto->reservas()) && !empty($usuario->reservas())) {
            /** @var Reserva $reservaObjeto */
            foreach ($objeto->reservas() as $reservaObjeto) {
                if ($reservaObjeto->usuario() == $usuario) {
                    return true;
                }
            }
        }
        return false;
    }
}