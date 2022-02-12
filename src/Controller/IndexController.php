<?php

namespace App\Controller;

use App\Objeto\Application\Create\ObjetoCreator;
use App\Objeto\Infrastructure\Persistence\ObjetoRepositoryMySql;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->redirectToRoute("create_index");
    }

    /**
     * @Route("/index", name="create_index")
     * @param ManagerRegistry $em
     * @return Response
     */
    public function createIndex(ManagerRegistry $em): Response
    {
        return $this->render('index.html.twig');
    }
}