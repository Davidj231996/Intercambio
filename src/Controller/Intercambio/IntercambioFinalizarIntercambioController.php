<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Finalizar\IntercambioFinalizarIntercambio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioFinalizarIntercambioController extends AbstractController
{
    public function __construct(private IntercambioFinalizarIntercambio $intercambioFinalizarIntercambio)
    {}

    /**
     * @Route("intercambiofinalizarintercambio/{intercambioId}", name="intercambio_finalizar_intercambio")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function finalizarIntercambio($intercambioId)
    {
        $this->intercambioFinalizarIntercambio->update($intercambioId);
        return $this->redirectToRoute('perfil');
    }
}