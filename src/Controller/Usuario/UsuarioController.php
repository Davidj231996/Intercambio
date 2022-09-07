<?php

namespace App\Controller\Usuario;

use App\Objeto\Application\UsuarioFinder\ObjetosUsuarioFinder;
use App\Usuario\Domain\UsuarioFinder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    public function __construct(private UsuarioFinder $finder, private ObjetosUsuarioFinder $objetosUsuarioFinder)
    {
    }

    /**
     * @Route("/usuario/{usuarioId}/{pagina}", name="usuario")
     * @param Request $request
     * @param int $usuarioId
     * @return Response
     */
    public function usuario(Request $request, int $usuarioId, int $pagina = 1): Response
    {
        $usuario = $this->finder->__invoke($usuarioId);
        if (!$this->isGranted('ROLE_ADMIN')) {
            if ($usuario->deshabilitado()) {
                return $this->redirect($request->headers->get('referer'));
            }
        }
        $paginator = $this->objetosUsuarioFinder->__invoke($usuario);
        // Establecemos el máximo por página
        $pageSize = 4;
        // Objetos totales
        $totalItems = $paginator->count();
        // Páginas totales
        $pagesCount = ceil($totalItems / $pageSize);

        // Obtenemos la pagina
        $paginator->getQuery()
            ->setFirstResult($pageSize * ($pagina - 1))
            ->setMaxResults($pageSize);

        return $this->render('usuario/usuario.html.twig', [
            'usuario' => $usuario,
            'objetos' => $paginator,
            'totalItems' => $totalItems,
            'paginas' => $pagesCount,
            'pagina' => $pagina
        ]);
    }
}