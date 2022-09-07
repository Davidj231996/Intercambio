<?php

namespace App\Email\Application\IntercambioObjeto;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;
use App\Intercambio\Domain\Intercambio;

class IntercambioObjetoEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send(Intercambio $intercambio)
    {
        $email = Email::create($intercambio->usuarioIntercambiar()->email(), 'Petición Intercambio', 'Email/IntercambioObjeto.html.twig',
            [
                "usuario" => $intercambio->usuarioIntercambiar()->alias(),
                "objeto" => $intercambio->objetoIntercambio()->nombre()
            ]
        );

        $this->mailer->send($email);

        $email = Email::create($intercambio->usuarioIntercambio()->email(), 'Petición Intercambio', 'Email/IntercambioObjeto.html.twig',
            [
                "usuario" => $intercambio->usuarioIntercambio()->alias(),
                "objeto" => $intercambio->objetoIntercambiar()->nombre()
            ]
        );

        $this->mailer->send($email);
    }
}