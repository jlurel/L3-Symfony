<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 11/03/2018
 * Time: 20:42
 */

namespace AppBundle\Form;


use AppBundle\Entity\Batiment;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('batiment', EntityType::class, array('class' => Batiment::class, 'choice_label' => 'idBatiment'))
            ->add('numEtage', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etage'
        ));
    }

    public function getBlockPrefix()
    {
        return 'registration_etage_form_type';
    }
}