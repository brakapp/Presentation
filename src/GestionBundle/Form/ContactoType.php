<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ContactoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('email')
            ->add('telefono')
            ->add('dpto', null,array(
                'label' => 'Seleccione un Area',
                'attr' => array('style' => 'width:97%')

            ))
            ->add('proyecto', null,array(
                'label' => 'Seleccione un Proyecto',
                'attr' => array('style' => 'width:97%')

            ))
            ->add('mensaje',null, array(
                'label'  => 'Mensaje',
                'attr' => array('style' => 'width:95%;height:150px;')
            ))
            ->add('acceppolitica', 'checkbox', array(
                'label' => "Acepto recibir información de Orbe S.A.S en mi celular",
                'required' => true
            ))
            ->add('accepcel', 'checkbox', array(
                'label' => "Acepto recibir información de Orbe S.A.S en mi correo electrónico",
                'required' => true
            ))
            ->add('accepmail', 'checkbox', array(
                'label' => "Acepto Políticas de Privacidad y Manejo de Información",
                'required' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Contacto'
        ));
    }
}
