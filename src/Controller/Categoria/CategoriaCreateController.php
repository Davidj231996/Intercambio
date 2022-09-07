<?php

namespace App\Controller\Categoria;

use App\Categoria\Application\Create\CategoriaCreate;
use App\Form\Categoria\CategoriaType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaCreateController extends AbstractController
{
    public function __construct(private CategoriaCreate $categoriaCreate)
    {}

    /**
     * @Route("/categoria", name="categoria_create")
     * @return RedirectResponse|Response
     */
    public function create(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(CategoriaType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->categoriaCreate->create($data['nombre'], $data['descripcion'], $data['categoria']);
                $this->addFlash(
                    'success',
                    'Categoría creada'
                );
                return $this->redirectToRoute('perfil_admin');
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al crear la categoría'
                );
            }
        }
        return $this->renderForm('categoria/create.html.twig', [
            'form' => $form
        ]);
    }
}