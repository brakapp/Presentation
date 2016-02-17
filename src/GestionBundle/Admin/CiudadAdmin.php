<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 29/01/16
 * Time: 03:34 PM
 */

namespace GestionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class CiudadAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombreciud')
            ->add('dpto')
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombreciud')
            ->add('dpto')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nombreciud')
            ->add('dpto')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array()
                )))
        ;
    }

}