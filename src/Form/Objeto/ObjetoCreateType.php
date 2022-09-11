<?php

namespace App\Form\Objeto;

use App\Categoria\Domain\Categoria;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjetoCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('nombre', TextType::class)
            ->add('descripcion', TextType::class)
            ->add('categorias', EntityType::class, [
                'class' => Categoria::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('categoria');
                },
                'choice_label' => 'nombre',
                'multiple' => true,
                'attr' => [
                    'class' => 'selectpicker pl-4',
                ]
            ])
            ->add('categoriasIntercambio', EntityType::class, [
                'class' => Categoria::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('categoria');
                },
                'choice_label' => 'nombre',
                'multiple' => true,
                'required' => false,
                'attr' => [
                    'class' => 'selectpicker pl-4',
                ]
            ])
            ->add('imagen', FileType::class, [
                'required' => false,
                'multiple' => true
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver  $resolver)
    {
        $resolver->setDefaults([
            // default form options
            'categorias' => []
        ]);
    }
}