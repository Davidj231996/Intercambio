<?php

namespace App\Email\Application\ContactoResponder;

use App\Email\Domain\Email;
use App\Email\Domain\EmailSender;

class ContactoResponderEmail
{
    public function __construct(private EmailSender $mailer)
    {
    }

    public function send($email, $mensaje) {
        $email = Email::create($email, 'Solicitud contacto', 'Email/ContactoResponder.html.twig',
            [
                "mensaje" => $mensaje
            ]
        );

        $this->mailer->send($email);
    }
}