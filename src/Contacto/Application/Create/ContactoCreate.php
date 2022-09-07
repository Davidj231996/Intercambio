<?php

namespace App\Contacto\Application\Create;

use App\Contacto\Domain\Contacto;
use App\Contacto\Domain\ContactoRepository;
use DateTime;

class ContactoCreate
{
    public function __construct(private ContactoRepository $contactoRepository)
    {
    }

    public function create(string $email, string $mensaje): void
    {
        $now = new DateTime();
        $contacto = Contacto::create(null, $email, $mensaje, $now);
        $this->contactoRepository->save($contacto);
    }
}