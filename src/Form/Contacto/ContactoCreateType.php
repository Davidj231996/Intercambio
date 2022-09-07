<?php

namespace App\Form\Contacto;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactoCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('email', TextType::class, [
            'required' => true
        ])
            ->add('mensaje', TextareaType::class, [
                'required' => true
            ])
            ->add('Enviar', SubmitType::class);
    }
}