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
     * @Route("/valoracionAdd/{valor}")
     * @param float $valor
     * @return Response
     */
    public function valoracionAdd(float $valor): Response
    {
        $this->add->add($this->getUser(), $valor);
        return $this->render('index.html.twig');
    }
}