<?php

namespace App\Email\Domain;

interface EmailSender
{
    public function send(Email $email);
}