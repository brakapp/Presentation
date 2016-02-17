<?php
/**
 * Created by Duviel Garcia.
 * Rol: Desarrollador Web
 * Date: 4/02/16
 * Time: 05:12 PM
 */

namespace PruebaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductoAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre','text', array('label'=>'Nombre del Producto', 'required'=>'true'))
            ->add('categoria')
        ;
    }
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('categoria')
        ;
    }
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('Nombre','text', array('label','Nombre del Producto'))
            ->add('categoria')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )))
        ;
    }

}