<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('mensaje',null, array(
                'label'  => 'Mensaje',
                'attr' => array('style' => 'width:95%;height:150px;')
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
