<?php

namespace App\Form\Intercambio;

use App\Objeto\Domain\Objeto;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class IntercambioCreateType extends AbstractType
{
    public function __construct(private Security $security)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objeto', EntityType::class, [
                'class' => Objeto::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('objeto')
                        ->where('objeto.estado = :estado')
                        ->andWhere('objeto.usuario = :usuario')
                        ->setParameter('estado', Objeto::ESTADO_PENDIENTE)
                        ->setParameter('usuario', $this->security->getUser());
                },
                'choice_label' => 'nombre',
                'multiple' => false,
                'attr' => [
                    'class' => 'selectpicker pl-4',
                ]
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // default form options
            'objeto' => null
        ]);
    }
}