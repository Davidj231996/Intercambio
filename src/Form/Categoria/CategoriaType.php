<?php

namespace App\Form\Categoria;

use App\Categoria\Domain\Categoria;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nombre', TextType::class)
            ->add('descripcion', TextType::class)
            ->add('categoria', EntityType::class, [
                'class' => Categoria::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('categoria');
                },
                'choice_label' => 'nombre',
                'multiple' => false,
                'attr' => [
                    'class' => 'selectpicker pl-4',
                ],
                'required' => false
            ])
            ->add('save', SubmitType::class);
    }
}