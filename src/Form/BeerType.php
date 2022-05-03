<?php

namespace App\Form;

use App\Entity\Beer;
use App\Entity\Category;
use App\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BeerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'inputSuper',
                ],
                'required' => false
            ])
            ->add('description', TextareaType::class)
            //>add('created_at')

            ->add('cat', EntityType::class, [
                // looks for choices from this entity
                'class' => Category::class,
                'choice_label' => 'name',
            ])

            ->add('skills', EntityType::class, [
                // looks for choices from this entity
                'class' => Skill::class,
                'choice_label' => 'titre',
                'multiple' => true,
                'expanded' => true
            ])

            ->add('isAttending', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'Maybe' => null,
                    'No'=> false 
                ],
                'mapped' => false
                ])
    ;}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Beer::class,
        ]);
    }
}
