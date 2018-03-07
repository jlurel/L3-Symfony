<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numSalle', IntegerType::class)
            ->add('disponibilite', RadioType::class, array(
                'value' => '2'
            ))
            ->add('contientProjecteur', RadioType::class, array(
                'value' => '2'
            ))
            ->add('reservations', CollectionType::class, array(
                'entry_type' => RegistrationReservationFormType::class
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Salle'
        ));
    }

    public function getBlockPrefix()
    {
        return 'registration_salle_form_type';
    }
}
