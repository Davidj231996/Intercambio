<?php

namespace App\Form\Usuario;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nombre', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('telefono', TelType::class)
            ->add('email', EmailType::class)
            ->add('actualizar', SubmitType::class);
    }
}