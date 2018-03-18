<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 11/03/2018
 * Time: 17:56
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Salle;
use AppBundle\Entity\Utilisateur;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ReservationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with('Propriétés', array('class' => 'col-md-7'))
                ->add('numReservation', IntegerType::class)
                ->add('demandeur', EntityType::class, array('class' => Utilisateur::class, 'choice_label' => 'nom'))
                ->add('salle', EntityType::class, array('class' => Salle::class, 'choice_label' => 'etage numSalle'))
            ->end()
            ->with('Créneau', array('class' => 'col-md-5'))
                ->add('dateReservation', DateType::class, array('widget' => 'choice'))
                ->add('heureDebut', TimeType::class, array('widget' => 'choice'))
                ->add('heureFin', TimeType::class, array('widget' => 'choice'))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('numReservation')
            ->add('dateReservation')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('demandeur')
            ->add('salle');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('numReservation')
            ->add('dateReservation')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('demandeur')
            ->add('salle');
    }

}