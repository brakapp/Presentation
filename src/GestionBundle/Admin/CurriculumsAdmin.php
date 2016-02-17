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
use Sonata\AdminBundle\Route\RouteCollection;

class CurriculumsAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cedula')
            ->add('nombre')
            ->add('email')
            ->add('urldocumento')
            ->add('file','file', array(
                'required'=>'false',
                'label' => 'Hola de Vida'
            ))
            ->add('cargo')
            ->add('departamento')

            ->add('ciudad', 'shtumi_dependent_filtered_entity', array(
                'entity_alias' => 'ciudad_by_dpto',
                'empty_value' => 'Select',
                'parent_field' => 'departamento',
                'required' => true,

            ))
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('email')
            ->add('ciudad')

        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nombre')
            ->add('email')
            ->add('departamento')
            ->add('ciudad')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array( ),
                    'descargar' => array(
                        'template' => 'GestionBundle:CRUD:list__action_descargar.html.twig'
                    )
                )))
        ;
    }


    public function prePersist($curriculum) {
        $this->saveFile($curriculum);
    }

    public function preUpdate($curriculum) {
        $this->saveFile($curriculum);
    }

    public function saveFile($curriculum) {
        $basepath = $this->getRequest()->getBasePath();
        $curriculum->upload($basepath);
    }


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('descargar', $this->getRouterIdParameter().'/descargar');
    }
}