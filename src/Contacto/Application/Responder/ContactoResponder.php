<?php

namespace App\Contacto\Application\Responder;

use App\Contacto\Domain\ContactoRepository;
use App\Email\Application\ContactoResponder\ContactoResponderEmail;

class ContactoResponder
{
    public function __construct(private ContactoRepository $repository, private ContactoResponderEmail $contactoResponderEmail)
    {
    }

    public function responder(int $id, string $mensaje) {
        $contacto = $this->repository->search($id);

        $this->contactoResponderEmail->send($contacto->email(), $mensaje);

        $contacto->responder();
        $this->repository->save($contacto);
    }
}