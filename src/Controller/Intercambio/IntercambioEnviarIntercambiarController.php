<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Enviar\IntercambioEnviarIntercambiar;
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
        $this->intercambioEnviarIntercambiar->update($intercambioId);
        return $this->redirectToRoute('perfil');
    }
}