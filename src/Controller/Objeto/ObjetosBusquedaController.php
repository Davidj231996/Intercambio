<?php

namespace App\Controller\Objeto;

use App\Objeto\Application\Busqueda\ObjetosBusqueda;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetosBusquedaController extends AbstractController
{
    public function __construct(private ObjetosBusqueda $objetosBusqueda)
    {
    }

    /**
     * @Route("/busqueda", name="busqueda")
     * @param Request $request
     * @return Response
     */
    public function busqueda(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $pagina = $request->get('pagina') ?? 1;
        $categoriasFiltro = $request->get('categoriasFiltro');

        $objetos = $this->objetosBusqueda->busqueda($busqueda, $request->get('categoriasFiltro'));
        $paginator = $objetos['paginator'];

        // Establecemos el máximo por página
        $pageSize = 8;
        // Objetos totales
        $totalItems = $paginator->count();
        // Páginas totales
        $pagesCount = ceil($totalItems / $pageSize);

        // Obtenemos la pagina
        $paginator->getQuery()
            ->setFirstResult($pageSize * ($pagina - 1))
            ->setMaxResults($pageSize);

        $objetos['objetos'] = $paginator;

        return $this->render('objeto/objetos.html.twig', [
            'objetos' => $objetos,
            'total' => $totalItems,
            'paginas' => $pagesCount,
            'pagina' => $pagina,
            'busqueda' => $busqueda,
            'categoriasFiltro' => $categoriasFiltro
        ]);
    }
}