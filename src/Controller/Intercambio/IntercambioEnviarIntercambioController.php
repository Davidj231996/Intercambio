<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Enviar\IntercambioEnviarIntercambio;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioEnviarIntercambioController extends AbstractController
{
    public function __construct(private IntercambioEnviarIntercambio $intercambioEnviarIntercambio)
    {}

    /**
     * @Route("intercambioenviarintercambio/{intercambioId}", name="intercambio_enviar_intercambio")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function enviarIntercambio($intercambioId)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        try {
            $this->intercambioEnviarIntercambio->update($intercambioId);
            $this->addFlash(
                'success',
                'Intercambio marcado como enviado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al marcar como enviado'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}