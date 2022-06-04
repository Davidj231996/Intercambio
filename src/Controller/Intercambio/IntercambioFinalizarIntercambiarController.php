<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Finalizar\IntercambioFinalizarIntercambiar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioFinalizarIntercambiarController extends AbstractController
{
    public function __construct(private IntercambioFinalizarIntercambiar $intercambioFinalizarIntercambiar)
    {}

    /**
     * @Route("intercambiofinalizarintercambiar/{intercambioId}", name="intercambio_finalizar_intercambiar")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function finalizarIntercambiar($intercambioId)
    {
        $this->intercambioFinalizarIntercambiar->update($intercambioId);
        return $this->redirectToRoute('perfil');
    }
}