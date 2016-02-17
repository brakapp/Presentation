<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 28/01/16
 * Time: 07:16 PM
 */

namespace GestionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PersonalAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre')
            ->add('apellidos')
            ->add('email')
            ->add('dpto')
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('apellidos')
            ->add('email')
            ->add('dpto')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nombre')
            ->add('apellidos')
            ->add('email')
            ->add('dpto')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array()
                )))
        ;
    }
}