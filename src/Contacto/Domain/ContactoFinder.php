<?php

namespace App\Contacto\Domain;

class ContactoFinder
{
    public function __construct(private ContactoRepository $repository)
    {
    }

    public function __invoke(int $id): Contacto
    {
        $contacto = $this->repository->search($id);

        if ($contacto === null) {
            throw new ContactoNotFound($id);
        }

        return $contacto;
    }
}