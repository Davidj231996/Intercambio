<?php

namespace App\Controller\Chat;

use App\Chat\Application\ChatLeido\ChatLeido;
use App\Chat\Domain\ChatRepository;
use App\Mensaje\Domain\MensajeRepository;
use App\Usuario\Application\ChatLeido\UsuarioChatLeido;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    public function __construct(
        private ChatRepository    $chatRepository,
        private MensajeRepository $mensajeRepository,
        private ChatLeido         $chatLeido,
        private UsuarioChatLeido  $usuarioChatLeido
    )
    {
    }

    /**
     * @Route("/chat/{chatId}", name="chat")
     * @param $chatId
     * @return Response
     */
    public function chat($chatId): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $chat = $this->chatRepository->search($chatId);
        $this->usuarioChatLeido->marcarLeido($this->getUser(), $chat);
        $this->chatLeido->marcarLeido($this->getUser(), $chat);
        $this->mensajeRepository->searchByChat($chat);
        return $this->render('chat/chat.html.twig', [
            'mensajes' => $chat->mensajes(),
            'chatId' => $chatId
        ]);
    }
}