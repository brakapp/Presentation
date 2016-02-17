<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 1/02/16
 * Time: 06:16 PM
 */

namespace GestionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class DocumentosAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('ruta','file', array('required'=>'false'))
        ;
    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('ruta')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('ruta')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )))
        ;
    }

    public function postPersist($documentos)
    {
        $documentos->upload();
    }

    public function prePersist($documentos)
    {
        $this->manageFileUpload($documentos);
    }

    public function preUpdate($documentos)
    {
        $this->manageFileUpload($documentos);
    }

    private function manageFileUpload($documentos)
    {
        if ($documentos->getFile()) {
            $documentos->refreshUpdated();
        }
    }

    public function saveFile($product) {
        $basepath = $this->getRequest()->getBasePath();
        $product->upload();
    }
}