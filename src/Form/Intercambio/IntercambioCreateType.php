<?php

namespace App\Form\Intercambio;

use App\Objeto\Domain\Objeto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IntercambioCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objeto', EntityType::class, [
                'class' => Objeto::class,
                'choices' => $options['data']['usuario']->objetos(),
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