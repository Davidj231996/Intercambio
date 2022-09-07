<?php

namespace App\Controller;

use App\Objeto\Application\ObjetoIndexFinder\ObjetoIndexFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(private ObjetoIndexFinder $objetoIndexFinder)
    {
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'objetos' => $this->objetoIndexFinder->__invoke()
        ]);
    }
}