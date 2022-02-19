<?php

namespace App\Controller\Objeto;

use App\Usuario\Domain\UsuarioFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetosUsuarioController extends AbstractController
{
    public function __construct(private UsuarioFinder $finder) {
    }


    /**
     * @Route("/objetosUsuario/{usuarioId}", name="objetos_usuario")
     * @param int $usuarioId
     * @return Response
     */
    public function objetosUsuario(int $usuarioId): Response
    {
        $usuario = $this->finder->__invoke($usuarioId);
        return $this->render('objetos.html.twig', [
            'objetos' => $usuario->objetos(),
            'usuario' => $usuario
        ]);
    }
}