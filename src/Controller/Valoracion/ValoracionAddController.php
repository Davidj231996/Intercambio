<?php

namespace App\Controller\Valoracion;

use App\Valoracion\Application\Add\ValoracionAdd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValoracionAddController extends AbstractController
{
    public function __construct(private ValoracionAdd $add)
    {}

    /**
     * @Route("/valoracionAdd/{usuarioId}/{valor}")
     * @param int $usuarioId
     * @param float $valor
     * @return Response
     */
    public function valoracionAdd(int $usuarioId, float $valor): Response
    {
        $this->add->add($usuarioId, $valor);
        return $this->render('index.html.twig');
    }
}