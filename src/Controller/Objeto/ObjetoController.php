<?php

namespace App\Controller\Objeto;

use App\Objeto\Domain\ObjetoFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoController extends AbstractController
{
    public function __construct(private ObjetoFinder $finder)
    {
    }

    /**
     * @Route("/objeto/{objetoId}", name="objeto")
     * @param int $objetoId
     * @return Response
     */
    public function objeto(int $objetoId): Response
    {
        return $this->render('objeto.html.twig', [
            'objeto' => $this->finder->__invoke($objetoId)
        ]);
    }
}