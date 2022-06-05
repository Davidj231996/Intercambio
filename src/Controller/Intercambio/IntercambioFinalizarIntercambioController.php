<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Finalizar\IntercambioFinalizarIntercambio;
use Exception;
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
        try {
            $this->intercambioFinalizarIntercambio->update($intercambioId);
            $this->addFlash(
                'success',
                'Intercambio marcado como finalizado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al marcar como finalizado'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}