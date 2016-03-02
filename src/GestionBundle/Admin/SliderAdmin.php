<?php
/**
 * Created by Duviel Garcia.
 * Rol: Desarrollador Web
 * Date: 8/02/16
 * Time: 04:30 PM
 */

namespace GestionBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SliderAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('proyecto')
            ->add('imagen','text', array('label'=>'imagen', 'required'=>'false'))
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
            ->add('imagen')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('proyecto')
            ->add('imagen','text', array('label','imagen'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )))
        ;
    }

    public function prePersist($slider) {
        $this->saveFile($slider);
    }

    public function preUpdate($slider) {
        $this->saveFile($slider);
    }

    public function saveFile($slider) {
        $basepath = $this->getRequest()->getBasePath();
        $slider->upload($basepath);
    }

}