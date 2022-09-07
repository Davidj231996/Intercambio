<?php

namespace App\Email\Application\ReservaObjetoRechazada;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Reserva\Domain\Reserva;
use App\Usuario\Domain\Usuario;

class ReservaObjetoRechazadaEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Reserva $reserva)
    {
        $email = Email::create($reserva->usuario()->email(), 'Petición Reserva Rechazada', 'Email/ReservaObjetoRechazada.html.twig',
            [
                "usuario" => $reserva->usuario()->alias(),
                "objeto" => $reserva->objeto()->nombre()
            ]
        );

        $this->mailer->send($email);

        $email = Email::create($reserva->objeto()->usuario()->email(), 'Petición Reserva Rechazada', 'Email/ReservaObjetoRechazada.html.twig',
            [
                "usuario" => $reserva->objeto()->usuario()->alias(),
                "objeto" => $reserva->objeto()->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}