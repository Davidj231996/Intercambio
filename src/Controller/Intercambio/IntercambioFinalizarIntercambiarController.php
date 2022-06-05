<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Finalizar\IntercambioFinalizarIntercambiar;
use Exception;
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
        try {
            $this->intercambioFinalizarIntercambiar->update($intercambioId);
            $this->addFlash(
                'success',
                'Intercambio marcado como finalizado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al marcar como finalizado el intercambio'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}