<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\ReservationHoraire;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
   
    public function buildForm(FormBuilderInterface $builder, array $options): void
    { 
        
        $builder
        ->add('user', EntityType::class, [
            'class' => User::class ,
            'choice_label' => 'email',
            'label'=> ' ',
            'disabled' => true,
            'data' => $options['user'],
            'mapped' => false,
            'attr' => [
                'class' => 'hidden',
            ]
        ])
        ->add('nameClient', TextType::class, [
            'label'=> 'Nom de la reservation',
            'required' => true,
        ])
        ->add('nbPersons',IntegerType::class, [
            'label'=> 'Nombre de couverts',
            'required' => true
        ])
        ->add('nbChildren',IntegerType::class, [
            'label'=> 'Dont Nombre d\'enfants',
            'required' => false
        ])
        ->add('date', DateType::class,[
            'label'=> 'Date souhaité',
            'widget' => 'single_text',
            'required'   => true
        ])
        ->add('heure' ,EntityType::class, [
            'class' => ReservationHoraire::class ,
        ])         
        ->add('comentaire',TextareaType::class,[
            'required' => false
        ])
        ->add('allergie',CheckboxType::class,[
            'label'=> 'Pour signaler une allergie cocher cette case',
            'required' => false
        ])
        ->add('envoyer', SubmitType::class);
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'user' => null
        ]);
    }
}
