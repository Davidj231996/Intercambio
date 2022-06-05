<?php

namespace App\Controller\Intercambio;

use App\Form\Intercambio\IntercambioCreateType;
use App\Intercambio\Application\Create\IntercambioCreate;
use App\Objeto\Domain\ObjetoFinder;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioCreatorController extends AbstractController
{
    public function __construct(private IntercambioCreate $intercambioCreate, private ObjetoFinder $objetoFinder)
    {
    }

    /**
     * @Route("/intercambiocreate/{objetoIntercambiarId}", name="intercambio_create")
     * @param Request $request
     * @param $objetoIntercambiarId
     * @return Response
     */
    public function create(Request $request, $objetoIntercambiarId): Response
    {
        $objetoIntercambiar = $this->objetoFinder->__invoke($objetoIntercambiarId);

        if (!$objetoIntercambiar->reservado() || $objetoIntercambiar->reserva()->usuario() != $this->getUser()) {
            $this->addFlash(
                'warning',
                'Este objeto no está reservado o lo ha reservado otro usuario'
            );
            return $this->redirectToRoute('objeto', [
                'objetoId' => $objetoIntercambiarId
            ]);
        }

        $form = $this->createForm(IntercambioCreateType::class, [
            'usuario' => $this->getUser()
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->intercambioCreate->create($data['objeto'], $objetoIntercambiar);
                $this->addFlash(
                    'success',
                    'Intercambio pedido'
                );
                return $this->redirectToRoute('objeto', [
                    'objetoId' => $objetoIntercambiarId
                ]);
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al pedir el intercambio'
                );
            }
        }

        return $this->renderForm('intercambio/create.html.twig', [
            'form' => $form
        ]);
    }
}