<?php

namespace App\Controller\Contacto;

use App\Contacto\Application\Responder\ContactoResponder;
use App\Form\Contacto\ContactoResponderType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoResponderController extends AbstractController
{
    public function __construct(private ContactoResponder $contactoResponder)
    {
    }

    /**
     * @Route("/responder/{contactoId}", name="responder")
     * @param Request $request
     * @param $contactoId
     * @return Response
     */
    public function responder(Request $request, $contactoId): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(ContactoResponderType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->contactoResponder->responder($contactoId, $data['mensaje']);
                $this->addFlash(
                    'success',
                    'Contacto respondido'
                );
                return $this->redirectToRoute('perfil_admin');
            } catch (Exception) {
                $this->addFlash(
                    'success',
                    'Error al responder'
                );
            }
        }
        return $this->renderForm('contacto/responder.html.twig', [
            'form' => $form
        ]);
    }
}