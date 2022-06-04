<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Create\IntercambioCreate;
use App\Objeto\Domain\ObjetoFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioCreatorController extends AbstractController
{
    public function __construct(private IntercambioCreate $intercambioCreate, private ObjetoFinder $objetoFinder)
    {
    }

    /**
     * @Route("/intercambiocreate/{objetoIntercambioId}/{objetoIntercambiarId}", name="intercambio_create")
     * @param $objetoIntercambioId
     * @param $objetoIntercambiarId
     * @return RedirectResponse
     */
    public function create($objetoIntercambioId, $objetoIntercambiarId)
    {
        $objetoIntercambio = $this->objetoFinder->__invoke($objetoIntercambioId);
        $objetoIntercambiar = $this->objetoFinder->__invoke($objetoIntercambiarId);

        if ($this->getUser() != $objetoIntercambio->usuario() && $this->getUser() == $objetoIntercambiar->usuario()
            && $objetoIntercambio->reservado() && $objetoIntercambio->reserva()->usuario() == $this->getUser()) {
            try {
                $this->intercambioCreate->create($objetoIntercambio, $objetoIntercambiar, $objetoIntercambio->usuario(), $objetoIntercambiar->usuario());
            } catch (\Exception $exception) {
                return $this->redirectToRoute('objeto', [
                    'objetoId' => $objetoIntercambioId
                ]);
            }
        }

        return $this->redirectToRoute('objeto', [
            'objetoId' => $objetoIntercambioId,
            'success' => 'Petición intercambio creada'
        ]);
    }
}