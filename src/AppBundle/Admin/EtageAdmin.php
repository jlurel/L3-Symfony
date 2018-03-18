<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 14/03/2018
 * Time: 15:00
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Batiment;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class EtageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('numEtage', IntegerType::class)
        ->add('batiment', EntityType::class, array('class' => Batiment::class, 'choice_label' => 'idBatiment'));
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('numEtage');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('numEtage');
        $list->add('_action', null, array('actions' => array('edit' => [], 'delete' => [])));
    }
}