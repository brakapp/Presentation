<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 28/01/16
 * Time: 07:09 PM
 */

namespace GestionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class PostventaAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombrepropietario','text', array('label'=>'Nombre', 'required'=>'true'))
            ->add('nombreapellidosol','text', array('label'=>'Apellidos', 'required'=>'true'))
            ->add('unidad','text', array('label'=>'Tipo', 'required'=>'true'))
            ->add('proyecto','text', array('label'=>'Proyecto', 'required'=>'true'))
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombrepropietario')
            ->add('nombreapellidosol')
            ->add('unidad')
            ->add('proyecto')

        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nombrepropietario','text', array('label','Nombre del Prpietario'))
            ->add('nombreapellidosol','text', array('label','Nombre del Solicitante'))
            ->add('email','text', array('label','Nombre del Solicitante'))
            ->add('proyecto')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )))
        ;
    }

}