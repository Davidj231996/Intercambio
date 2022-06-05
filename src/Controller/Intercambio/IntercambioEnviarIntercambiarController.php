<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Enviar\IntercambioEnviarIntercambiar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioEnviarIntercambiarController extends AbstractController
{
    public function __construct(private IntercambioEnviarIntercambiar $intercambioEnviarIntercambiar)
    {}

    /**
     * @Route("intercambioenviarintercambiar/{intercambioId}", name="intercambio_enviar_intercambiar")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function enviarIntercambiar($intercambioId)
    {
        try {
            $this->intercambioEnviarIntercambiar->update($intercambioId);
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