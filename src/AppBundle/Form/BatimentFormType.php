<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 11/03/2018
 * Time: 20:53
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BatimentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idBatiment', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Batiment'
        ));
    }

    public function getBlockPrefix()
    {
        return 'registration_batiment_form_type';
    }
}