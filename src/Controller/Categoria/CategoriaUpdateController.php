<?php

namespace App\Controller\Categoria;

use App\Categoria\Application\Update\CategoriaUpdate;
use App\Categoria\Domain\CategoriaRepository;
use App\Form\Categoria\CategoriaType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaUpdateController extends AbstractController
{
    public function __construct(private CategoriaUpdate $categoriaUpdate, private CategoriaRepository $repository)
    {}

    /**
     * @Route("/categoriaUpdate/{categoriaId}", name="categoria_update")
     * @return RedirectResponse|Response
     */
    public function create(Request $request, $categoriaId)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $categoria = $this->repository->search($categoriaId);
        $form = $this->createForm(CategoriaType::class, [
            'nombre' => $categoria->nombre(),
            'descripcion' => $categoria->descripcion(),
            'categoria' => $categoria->categoria()
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->categoriaUpdate->update($categoria, $data['nombre'], $data['descripcion'], $data['categoria']);
                $this->addFlash(
                    'success',
                    'Categoría modificada'
                );
                return $this->redirectToRoute('perfil_admin');
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al modificar la categoría'
                );
            }
        }
        return $this->renderForm('categoria/update.html.twig', [
            'form' => $form
        ]);
    }
}