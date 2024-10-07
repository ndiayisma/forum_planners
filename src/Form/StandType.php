<?php

namespace App\Form;

use App\Entity\Evaluation;
use App\Entity\Forum;
use App\Entity\Stand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $stand = $options['data'];

        $builder
            ->add('title')
            ->add('picture')
            ->add('description')
            ->add('capacity')
            ->add('duration', null, [
                'widget' => 'single_text',
            ])
            ->add('forum', EntityType::class, [
                'class' => Forum::class,
                'choice_label' => 'id',
            ])
            ->add('averageRating', TextType::class, [
                'mapped' => false,
                'data' => $stand->getAverageRating(),
                'attr' => [
                    'readonly' => true,
                ],
                'label' => 'Average Rating',

            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stand::class,
        ]);
    }
}
