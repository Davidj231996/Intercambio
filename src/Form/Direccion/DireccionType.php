<?php

namespace App\Form\Direccion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class DireccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('direccion', TextType::class)
            ->add('ciudad', TextType::class)
            ->add('provincia', TextType::class)
            ->add('comunidadAutonoma', TextType::class)
            ->add('codigoPostal', NumberType::class)
            ->add('usuario', HiddenType::class)
            ->add('save', SubmitType::class);
    }
}