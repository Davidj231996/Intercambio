<?php

namespace App\Controller\Contacto;

use App\Contacto\Application\Create\ContactoCreate;
use App\Form\Contacto\ContactoCreateType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoCreateController extends AbstractController
{
    public function __construct(private ContactoCreate $contactoCreate)
    {
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto(Request $request): Response
    {
        $form = $this->createForm(ContactoCreateType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->contactoCreate->create($data['email'], $data['mensaje']);
                $this->addFlash(
                    'success',
                    'Gracias por contactar'
                );
            } catch (Exception $exception) {
                $this->addFlash(
                    'error',
                    'Error al intentar contactar'
                );
            }
        }
        return $this->renderForm('Contacto/contacto.html.twig', [
            'form' => $form
        ]);
    }
}