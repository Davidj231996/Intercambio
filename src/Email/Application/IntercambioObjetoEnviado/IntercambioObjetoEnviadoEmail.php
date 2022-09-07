<?php

namespace App\Email\Application\IntercambioObjetoEnviado;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Intercambio\Domain\Intercambio;
use App\Objeto\Domain\Objeto;

class IntercambioObjetoEnviadoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Intercambio $intercambio, Objeto $objeto)
    {
        $email = Email::create($intercambio->usuarioIntercambio()->email(), 'Objeto de Intercambio Enviado', 'Email/IntercambioObjetoEnviado.html.twig',
            [
                "usuario" => $intercambio->usuarioIntercambio()->alias(),
                "objeto" => $objeto->nombre()
            ]
        );

        $this->mailer->send($email);

        $email = Email::create($intercambio->usuarioIntercambiar()->email(), 'Objeto de Intercambio Enviado', 'Email/IntercambioObjetoEnviado.html.twig',
            [
                "usuario" => $intercambio->usuarioIntercambiar()->alias(),
                "objeto" => $objeto->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}