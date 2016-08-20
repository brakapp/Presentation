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
use Symfony\Component\DependencyInjection\ContainerInterface;


class ProyectosAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        // get the current Image instance
        $image = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($image && ($webPath = $image->getWebPath())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }
        /*$formMapper
            ->add('nombre')
            ->add('latitud')
            ->add('longitud')
            ->add('descripcion','sonata_formatter_type', array(
                'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field'   => 'nombre',
                'source_field'   => 'descripcion',
                'source_field_options'      => array(
                    'horizontal_input_wrapper_class' => $this->getConfigurationPool()->getOption('form_type') == 'horizontal' ? 'col-lg-12': '',
                    'attr' => array('class' => $this->getConfigurationPool()->getOption('form_type') == 'horizontal' ? 'span10 col-sm-10 col-md-10': '', 'rows' => 20)
                ),
                'ckeditor_context'     => 'default',
                'target_field'   => 'descripcion',
                'listener'       => true,
            ))
        ;*/

        $formMapper
            ->add('nombre')
            ->add('latitud')
            ->add('longitud')
            ->add('direccion')
            ->add('estado')
            ->add('icono')
            ->add('video')
            #->add('file','file',$fileFieldOptions,  array(
            #    'required'=>'false',
            #    'label' => 'Icono del Proyecto'
            #))
            ->add('file','file', array(
                'required'=>'false',
                'label' => 'Icono del Proyecto'
            ))
            ->add('descripcion')
        ;


    }
// Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('direccion')
            ->add('latitud')
            ->add('longitud')
        ;
    }
// Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nombre')
            ->add('direccion')
            ->add('latitud')
            ->add('longitud')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array()
                )))
        ;
    }

    public function prePersist($icono) {
        $this->saveFile($icono);
    }

    public function preUpdate($icono) {
        $this->saveFile($icono);
    }

    public function saveFile($icono) {
        $basepath = $this->getRequest()->getBasePath();
        //$icono->upload($basepath);
    }

}