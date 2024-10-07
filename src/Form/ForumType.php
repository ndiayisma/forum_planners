<?php

namespace App\Form;

use App\Entity\Forum;
use App\Entity\User;
use App\Entity\Stand;
use App\Form\StandType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('picture')
            ->add('description')
            ->add('location')
            ->add('stands', EntityType::class, [
                'class' => Stand::class,
                'choice_label' => 'title', // or any other property you want to display
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forum::class,
        ]);
    }
}
