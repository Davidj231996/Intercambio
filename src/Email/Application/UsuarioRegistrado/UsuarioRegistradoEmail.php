<?php

namespace App\Email\Application\UsuarioRegistrado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Usuario\Domain\Usuario;

class UsuarioRegistradoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Usuario $usuario)
    {
        $email = Email::create($usuario->email(), 'Bienvenido a Truequeweb', 'Email/UsuarioRegistrado.html.twig',
            ["usuario" => $usuario->alias()]
        );

        $this->mailer->send($email);
    }
}