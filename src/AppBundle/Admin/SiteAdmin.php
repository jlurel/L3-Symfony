<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 02/04/2018
 * Time: 02:03
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SiteAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('libelle', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('libelle');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('libelle');
        $list->add('_action', null, array('actions' => array('edit' => [], 'delete' => [])));
    }
}