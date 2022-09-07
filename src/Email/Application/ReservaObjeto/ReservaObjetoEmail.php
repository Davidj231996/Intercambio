<?php

namespace App\Email\Application\ReservaObjeto;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Reserva\Domain\Reserva;

class ReservaObjetoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Reserva $reserva)
    {
        $email = Email::create($reserva->usuario()->email(), 'Petición Reserva', 'Email/ReservaObjeto.html.twig',
            [
                "usuario" => $reserva->usuario()->alias(),
                "objeto" => $reserva->objeto()->nombre()
            ]
        );

        $this->mailer->send($email);

        $email = Email::create($reserva->objeto()->usuario()->email(), 'Petición Reserva', 'Email/ReservaObjeto.html.twig',
            [
                "usuario" => $reserva->objeto()->usuario()->alias(),
                "objeto" => $reserva->objeto()->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}