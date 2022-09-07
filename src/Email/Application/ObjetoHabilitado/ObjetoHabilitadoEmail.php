<?php

namespace App\Email\Application\ObjetoHabilitado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Objeto\Domain\Objeto;
use App\Usuario\Domain\Usuario;

class ObjetoHabilitadoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Objeto $objeto)
    {
        $email = Email::create($objeto->usuario()->email(), 'Objeto Activado', 'Email/ObjetoHabilitado.html.twig',
            [
                "usuario" => $objeto->usuario()->alias(),
                "objeto" => $objeto->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}