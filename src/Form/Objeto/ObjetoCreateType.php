<?php

namespace App\Form\Objeto;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ObjetoCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nombre', TextType::class)
            ->add('descripcion', TextType::class)
            ->add('categorias', ChoiceType::class, [
                'choices' => $options['categorias']
            ])
            ->add('save', SubmitType::class);
    }
}