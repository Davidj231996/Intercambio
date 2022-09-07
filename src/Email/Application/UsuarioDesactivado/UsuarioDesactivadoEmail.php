<?php

namespace App\Email\Application\UsuarioDesactivado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Usuario\Domain\Usuario;

class UsuarioDesactivadoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Usuario $usuario)
    {
        $email = Email::create($usuario->email(), 'Usuario Desactivado', 'Email/UsuarioDesactivado.html.twig',
            ["usuario" => $usuario->alias()]
        );

        $this->mailer->send($email);
    }
}