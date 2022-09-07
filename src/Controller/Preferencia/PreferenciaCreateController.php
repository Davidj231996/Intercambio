<?php

namespace App\Controller\Preferencia;

use App\Form\Preferencia\PreferenciaCreateType;
use App\Preferencia\Application\Create\PreferenciaCreate;
use App\Preferencia\Domain\Preferencia;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PreferenciaCreateController extends AbstractController
{
    public function __construct(private PreferenciaCreate $preferenciaCreate)
    {
    }

    /**
     * @Route("preferencia_create", name="preferencia_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function create(Request $request): RedirectResponse|Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $categorias = [];
        /** @var Preferencia $preferencia */
        foreach ($this->getUser()->preferencias() as $preferencia) {
            $categorias[] = $preferencia->categoria();
        }
        $form = $this->createForm(PreferenciaCreateType::class, [
            'categorias' => $categorias
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->preferenciaCreate->create($this->getUser(), $data['categorias']);
                $this->addFlash(
                    'success',
                    'Preferencias añadidas'
                );
                return $this->redirectToRoute('perfil');
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al añadir preferencias'
                );
            }
        }
        return $this->renderForm('preferencia/create.html.twig', [
            'form' => $form
        ]);
    }
}