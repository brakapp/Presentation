<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 28/01/16
 * Time: 07:12 PM
 */

namespace GestionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class ProveedoresAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cedula', null, array('label'=>'Cedula o NIT'))
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('urldocumento')
            ->add('departamento')
            ->add('ciudad', 'shtumi_dependent_filtered_entity', array(
                'entity_alias' => 'ciudad_by_dpto',
                'empty_value' => 'Select',
                'parent_field' => 'departamento',
                'required' => true,

            ))
            ->add('file','file', array(
                'required'=>'false',
                'label' => 'Seleccione la propuesta'
            ))
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('cedula')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('urldocumento')
            ->add('departamento')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('cedula')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('urldocumento')
            ->add('departamento')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'descargar' => array(
                        'template' => 'GestionBundle:CRUD:list__action_descargar.html.twig'
                    )
                )))
        ;
    }
    public function prePersist($proveedores) {
        $this->saveFile($proveedores);
    }

    public function preUpdate($proveedores) {
        $this->saveFile($proveedores);
    }

    public function saveFile($proveedores) {
        $basepath = $this->getRequest()->getBasePath();
        $proveedores->upload($basepath);
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('descargar', $this->getRouterIdParameter().'/descargar');
    }





}