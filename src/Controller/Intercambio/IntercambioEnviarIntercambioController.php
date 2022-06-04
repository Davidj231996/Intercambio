<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Enviar\IntercambioEnviarIntercambio;
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
        $this->intercambioEnviarIntercambio->update($intercambioId);
        return $this->redirectToRoute('perfil');
    }
}