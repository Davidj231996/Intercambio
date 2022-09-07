<?php

namespace App\Controller\Chat;

use App\Chat\Application\Create\ChatCreate;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChatCreateController extends AbstractController
{
    public function __construct(private ChatCreate $chatCreate)
    {
    }

    /**
     * @Route("/chatCreate/{usuarioId}", name="chatCreate")
     * @param Request $request
     * @param $usuarioId
     * @return RedirectResponse
     */
    public function chatCreate(Request $request, $usuarioId): RedirectResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        try {
            $this->chatCreate->create($this->getUser(), $usuarioId);
            $this->addFlash(
                'success',
                'Chat creado correctamente'
            );
            return $this->redirectToRoute('chats');
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al crear el chat'
            );
            return $this->redirect($request->headers->get('referer'));
        }
    }
}