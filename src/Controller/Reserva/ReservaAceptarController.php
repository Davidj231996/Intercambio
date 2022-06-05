<?php

namespace App\Controller\Reserva;

use App\Reserva\Application\Aceptar\ReservaAceptar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservaAceptarController extends AbstractController
{
    public function __construct(private ReservaAceptar $reservaAceptar) {}

    /**
     * @Route("reservaaceptar/{reservaId}", name="reserva_aceptar")
     * @param Request $request
     * @param $reservaId
     * @return mixed
     */
    public function aceptar(Request $request, $reservaId) {
        try {
            $this->reservaAceptar->update($reservaId);
            $this->addFlash(
                'success',
                'Reserva aceptada'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al aceptar la reserva'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}