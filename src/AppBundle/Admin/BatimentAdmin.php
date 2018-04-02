<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 14/03/2018
 * Time: 15:11
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Site;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BatimentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('libelle', TextType::class)
        ->add('site', EntityType::class, array('class' => Site::class));
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