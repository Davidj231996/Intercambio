<?php

namespace App\Email\Application\UsuarioActivado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Usuario\Domain\Usuario;

class UsuarioActivadoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Usuario $usuario)
    {
        $email = Email::create($usuario->email(), 'Usuario Activado', 'Email/UsuarioActivado.html.twig',
            ["usuario" => $usuario->alias()]
        );

        $this->mailer->send($email);
    }
}