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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ReservationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with('Propriétés', array('class' => 'col-md-3'))
                ->add('title', TextType::class)
                ->add('salle', EntityType::class, array('class' => Salle::class))
            ->end()
            ->with('Créneau', array('class' => 'col-md-9'))
                ->add('startDate', DateTimeType::class, array('widget' => 'choice'))
                ->add('endDate', DateTimeType::class, array('widget' => 'choice'))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('title')
            ->add('startDate')
            ->add('endDate');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('title')
            ->add('startDate')
            ->add('endDate');
        $list->add('_action', null, array('actions' => array('edit' => [], 'delete' => [])));
    }

}