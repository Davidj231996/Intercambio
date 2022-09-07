<?php

namespace App\Controller\Usuario;

use App\Form\Usuario\UsuarioImagenType;
use App\Imagen\Application\UsuarioCreate\ImagenUsuarioCreate;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioImagenController extends AbstractController
{
    public function __construct(private ImagenUsuarioCreate $imagenUsuarioCreate)
    {
    }

    /**
     * @Route("/imagenUsuario", name="imagenUsuario")
     */
    public function imagenUsuario(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $form = $this->createForm(UsuarioImagenType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $this->getUser();
            $data = $form->getData();
            try {
                $this->imagenUsuarioCreate->create($usuario, $data['imagen']);
                $this->addFlash(
                    'success',
                    'Imagen perfil actualizada'
                );
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al actualizar la imagen de perfil'
                );
            }
        } else {
            $this->addFlash(
                'warning',
                'Imagen no valida'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}