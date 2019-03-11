<?php

namespace AppBundle\Form\Type;


use AppBundle\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Recipes',
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [])
            ->add('ingredients', TextType::class, [])
            ->add('prepDesc', TextType::class, [])
            ->add('prepTime', NumberType::class, [
                'label' => 'Bereidingstijd in minuten'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class
            ])
            ->add('Submit', SubmitType::class, [
                'label' => 'Wijzigen'
            ]);
    }
}