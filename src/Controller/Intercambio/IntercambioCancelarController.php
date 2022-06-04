<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Aceptar\IntercambioAceptar;
use App\Intercambio\Application\Cancelar\IntercambioCancelar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioCancelarController extends AbstractController
{
    public function __construct(private IntercambioCancelar $intercambioCancelar)
    {}

    /**
     * @Route("intercambiocancelar/{intercambioId}", name="intercambio_cancelar")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function cancelar($intercambioId)
    {
        $this->intercambioCancelar->cancelar($intercambioId);
        return $this->redirectToRoute('perfil');
    }
}