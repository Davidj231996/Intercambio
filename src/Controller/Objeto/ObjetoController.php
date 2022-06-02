<?php

namespace App\Controller\Objeto;

use App\Objeto\Application\ReservadoUsuario\ObjetoReservadoUsuario;
use App\Objeto\Domain\ObjetoFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoController extends AbstractController
{
    public function __construct(private ObjetoFinder $finder, private ObjetoReservadoUsuario $objetoReservadoUsuario)
    {
    }

    /**
     * @Route("/objeto/{objetoId}", name="objeto")
     * @param int $objetoId
     * @return Response
     */
    public function objeto(int $objetoId): Response
    {
        $objeto = $this->finder->__invoke($objetoId);
        return $this->render('objeto/objeto.html.twig', [
            'objeto' => $objeto,
            'reservado' => $this->objetoReservadoUsuario->estaReservado($objeto, $this->getUser())
        ]);
    }
}