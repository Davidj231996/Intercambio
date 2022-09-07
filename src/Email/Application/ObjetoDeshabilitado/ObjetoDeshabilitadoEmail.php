<?php

namespace App\Email\Application\ObjetoDeshabilitado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Objeto\Domain\Objeto;

class ObjetoDeshabilitadoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Objeto $objeto)
    {
        $email = Email::create($objeto->usuario()->email(), 'Objeto Desactivado', 'Email/ObjetoDeshabilitado.html.twig',
            [
                "usuario" => $objeto->usuario()->alias(),
                "objeto" => $objeto->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}