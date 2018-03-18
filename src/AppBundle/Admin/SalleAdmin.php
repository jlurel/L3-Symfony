<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 14/03/2018
 * Time: 13:49
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Etage;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SalleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('numSalle', IntegerType::class)
            ->add('etage', EntityType::class, array('class' => Etage::class, 'choice_label' => 'numEtage'));
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('numSalle');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('numSalle');
    }
}