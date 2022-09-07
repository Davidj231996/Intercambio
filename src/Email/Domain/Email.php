<?php

namespace App\Email\Domain;

class Email
{
    public function __construct(
        private string $email,
        private string $subject,
        private string $template,
        private array  $parameters = []
    )
    {
    }

    public static function create(string $email, string $subject, string $template, array $parameters = []): Email
    {
        return new self($email, $subject, $template, $parameters);
    }

    public function email(): string
    {
        return $this->email;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function template(): string
    {
        return $this->template;
    }

    public function parameters(): array
    {
        return $this->parameters;
    }
}