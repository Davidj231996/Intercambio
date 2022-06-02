<?php

namespace App\Controller\Reserva;

use App\Objeto\Domain\ObjetoFinder;
use App\Reserva\Application\Create\ReservaCreate;
use App\Usuario\Domain\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservaCreatorController extends AbstractController
{
    public function __construct(private ReservaCreate $reservaCreate, private ObjetoFinder $objetoFinder)
    {
    }

    /**
     * @Route("/reservacreate/{objetoId}", name="reserva_create")
     * @param Request $request
     * @param $objetoId
     * @return RedirectResponse
     */
    public function create(Request $request, $objetoId)
    {
        $objeto = $this->objetoFinder->__invoke($objetoId);
        $this->reservaCreate->create($this->getUser(), $objeto);

        return $this->redirectToRoute('objeto', [
            'objetoId' => $objetoId
        ]);
    }
}