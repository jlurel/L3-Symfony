<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationEtudiantFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('numEtudiant', IntegerType::class)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('adresse', TextType::class)
            ->add('codePostal', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('telephone', IntegerType::class)
            ->add('dateNaissance', DateType::class, array('widget' => 'single_text'))
            ->add('reservations', CollectionType::class, array(
                'entry_type' => ReservationFormType::class
            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType'; // TODO: Change the autogenerated stub
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etudiant'
        ));
    }

    public function getBlockPrefix()
    {
        return 'etudiant_registrationtype';
    }
}
