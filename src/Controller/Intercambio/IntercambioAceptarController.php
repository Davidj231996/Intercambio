<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Aceptar\IntercambioAceptar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioAceptarController extends AbstractController
{
    public function __construct(private IntercambioAceptar $intercambioAceptar)
    {}

    /**
     * @Route("intercambioaceptar/{intercambioId}", name="intercambio_aceptar")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function aceptar($intercambioId)
    {
        $this->intercambioAceptar->aceptar($intercambioId);
        return $this->redirectToRoute('perfil');
    }
}