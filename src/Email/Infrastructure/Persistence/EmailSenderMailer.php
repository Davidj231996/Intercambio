<?php

namespace App\Email\Infrastructure\Persistence;

use App\Email\Domain\Email;
use App\Email\Domain\EmailNotSend;
use App\Email\Domain\EmailSender;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class EmailSenderMailer implements EmailSender
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function send(Email $email)
    {
        $mail = (new TemplatedEmail())
            ->from('alerodiez8dj@hotmail.com')
            ->to($email->email())
            ->subject($email->subject())
            ->htmlTemplate($email->template())
            ->context($email->parameters());

        try {
            $this->mailer->send($mail);
        } catch (TransportExceptionInterface $e) {
            throw new EmailNotSend();
        }
    }
}