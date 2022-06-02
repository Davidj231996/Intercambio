<?php

namespace App\Controller\Reserva;

use App\Reserva\Application\Cancelar\ReservaCancelar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservaCancelarController extends AbstractController
{
    public function __construct(private ReservaCancelar $reservaCancelar){}

    /**
     * @Route("reservacancelar/{reservaId}", name="reserva_cancelar")
     * @param Request $request
     * @param $reservaId
     * @return mixed
     */
    public function cancelar(Request $request, $reservaId)
    {
        $this->reservaCancelar->update($reservaId);
        return $this->redirect($request->headers->get('referer'));
    }
}