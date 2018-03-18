<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 14/03/2018
 * Time: 15:11
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BatimentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('idBatiment', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('idBatiment');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('idBatiment');
    }
}