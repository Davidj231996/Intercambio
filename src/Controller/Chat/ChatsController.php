<?php

namespace App\Controller\Chat;

use App\Chat\Application\Usuario\ChatsUsuario;
use App\Usuario\Domain\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatsController extends AbstractController
{
    public function __construct(private ChatsUsuario $chatsUsuario)
    {
    }

    /**
     * @Route("/chats", name="chats")
     * @return Response
     */
    public function chats(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        /** @var Usuario $usuario */
        $usuario = $this->getUser();
        $chats = $this->chatsUsuario->searchByUsuario($usuario);
        return $this->render('chat/chats.html.twig', [
            'chats' => $chats
        ]);
    }
}