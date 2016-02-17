<?php

/**
 * Created by Duviel Garcia
 * Date: 4/02/16
 * Time: 05:08 PM
 */

namespace PruebaBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SeleccionAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('codigo','text', array('label'=>'codigo', 'required'=>'true'))
            ->add('categoria')
            ->add('productos')
            ->add('productos', 'shtumi_dependent_filtered_entity', array(
                'entity_alias' => 'producto_by_categoria',
                'empty_value' => 'Select',
                'parent_field' => 'categoria',
                'required' => true,

            ))
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('categoria')
            ->add('productos')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('codigo','text', array('label','codigo de la seleccion'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )))
        ;
    }

}