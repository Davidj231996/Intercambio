<?php

namespace App\Shared\Domain;

use DomainException;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

abstract class DomainError extends DomainException
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;

    abstract protected function errorMessage(): string;
}