<?php

namespace App\Controller\Usuario;

use App\Form\Usuario\UsuarioType;
use App\Usuario\Application\Create\UsuarioCreate;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioCreateController extends AbstractController
{
    public function __construct(private UsuarioCreate $creator)
    {
    }

    /**
     * @Route("/usuarioCreate", name="usuario_create")
     * @param Request $request
     * @return Response
     */
    public function usuarioCreate(Request $request): Response
    {
        $form = $this->createForm(UsuarioType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $usuario = $this->creator->create($data['alias'], $data['nombre'], $data['apellidos'], $data['telefono'], $data['email'], $data['password']);
                $this->addFlash(
                    'success',
                    'Usuario creado'
                );
                return $this->redirectToRoute('direccion_creator', ['usuarioId' => $usuario->id()]);
            } catch (Exception) {
                $this->addFlash(
                    'success',
                    'Error al crear el usuario'
                );
            }
        }
        return $this->renderForm('usuario/create.html.twig', [
            'form' => $form
        ]);
    }
}