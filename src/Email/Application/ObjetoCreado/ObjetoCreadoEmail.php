<?php

namespace App\Email\Application\ObjetoCreado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Objeto\Domain\Objeto;

class ObjetoCreadoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Objeto $objeto)
    {
        $email = Email::create($objeto->usuario()->email(), 'Objeto Creado', 'Email/ObjetoCreado.html.twig',
            [
                "usuario" => $objeto->usuario()->alias(),
                "objeto" => $objeto->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}