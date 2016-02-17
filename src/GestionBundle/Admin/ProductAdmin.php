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


class ProductAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('general')
            ->add('file','file', array(
                'required'=>'false'
            ))
            ->end()
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('imageName')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                'header_style' => 'width:5%; text-align: center',
                'row_align' => 'left'
            ))
            ->add('imageName',null, array(
                'label' => 'Nombre de archivo'


            ))
            ->add('_action', 'actions', array(
                'header_style'=> 'width:15%; text-align: center; color:red',
                'row_align' => 'right',
                'label' => 'Acciones',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )))
        ;
    }

    public function prePersist($product) {
        $this->saveFile($product);
    }

    public function preUpdate($product) {
        $this->saveFile($product);
    }

    public function saveFile($product) {
        $basepath = $this->getRequest()->getBasePath();
        $product->upload($basepath);
    }

}