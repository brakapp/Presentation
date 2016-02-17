<?php
/**
 * Created by Duviel Garcia.
 * Rol: Desarrollador Web
 * Date: 9/02/16
 * Time: 03:52 PM
 */

namespace GestionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PlanosAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('proyecto')
            ->add('urlplano','text', array('label'=>'Plano del proyecto', 'required'=>'false'))
            ->add('file','file', array(
                'required'=>'false',
                'label' => 'Seleccione la imagen'
            ))
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('proyecto')
            ->add('urlplano')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('proyecto')
            ->add('urlplano','text', array('label','Plano'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
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

}