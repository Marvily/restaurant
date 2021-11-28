<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class,[
                'label'=> 'Horaire',
                'choices'=> [
                    'midi' => Reservation::TYPE_MIDI,
                    'soir' => Reservation::TYPE_SOIR
                ]
            ])
            ->add('prenom', TextType::class,[
                'label'=>'Prénom'
            ])
            ->add('nom',TextType::class,[
                'label'=>'Nom'
            ])
            ->add('dateDeReservation', DateType::class,[
                'label'=> 'Date de reservation',
                'widget' => 'single_text',

            ])
            ->add('nombreDePersonne', IntegerType::class,[
                'label'=> 'Nombre de personnes'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Submit'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
