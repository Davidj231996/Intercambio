<?php

namespace App\Controller\Objeto;

use App\Favorito\Application\Existe\FavoritoExiste;
use App\Objeto\Application\ReservadoUsuario\ObjetoReservadoUsuario;
use App\Objeto\Domain\ObjetoFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoController extends AbstractController
{
    public function __construct(private ObjetoFinder $finder, private ObjetoReservadoUsuario $objetoReservadoUsuario, private FavoritoExiste $favoritoExiste)
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
            'reservado' => !$this->getUser() || $this->objetoReservadoUsuario->estaReservado($objeto, $this->getUser()),
            'favoritoCreado' => $this->favoritoExiste->existe($this->getUser(), $objeto)
        ]);
    }
}