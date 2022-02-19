<?php

namespace App\Form\Imagen;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ImagenUsuarioCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('descripcion', TextType::class)
            ->add('imagen', FileType::class)
            ->add('usuario', HiddenType::class)
            ->add('save', SubmitType::class);
    }
}