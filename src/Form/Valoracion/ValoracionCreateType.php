<?php

namespace App\Form\Valoracion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ValoracionCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('valor', NumberType::class, [
            'scale' => 1,
            'html5' => true,
            'attr' => [
                'min' => 0,
                'max' => 5,
                'step' => 'any'
            ]
        ])
            ->add('referer', HiddenType::class)
            ->add('save', SubmitType::class);
    }
}