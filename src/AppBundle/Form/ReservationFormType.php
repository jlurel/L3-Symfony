<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numReservation', IntegerType::class)
            ->add('dateReservation', DateType::class, array('widget' => 'single_text'))
            ->add('heureDebut', TimeType::class, array('widget' => 'choice'))
            ->add('heureFin', TimeType::class, array('widget' => 'choice'))
            ->add('demandeur', RegistrationUtilisateurFormType::class)
            ->add('salle', RegistrationSalleFormType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation'
        ));
    }

    public function getBlockPrefix()
    {
        return 'registration_reservation_form_type';
    }
}
