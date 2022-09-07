<?php

namespace App\Controller\Mensaje;

use App\Chat\Domain\ChatRepository;
use App\Mensaje\Application\Create\MensajeCreate;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MensajeCreateController extends AbstractController
{
    public function __construct(private MensajeCreate $mensajeCreate, private ChatRepository $chatRepository)
    {
    }

    /**
     * @Route("/mensaje/{chatId}", name="mensaje")
     * @param Request $request
     * @param $chatId
     * @return JsonResponse
     */
    public function mensajeCreate(Request $request, $chatId) {
        $mensaje = $request->get('mensaje');
        $chat = $this->chatRepository->search($chatId);
        try {
            $this->mensajeCreate->create($chat, $this->getUser(), $mensaje);
            return new JsonResponse(['success' => true]);
        } catch (Exception) {
            return new JsonResponse(['success' => false]);
        }
    }
}