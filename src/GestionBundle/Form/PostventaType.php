<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PostventaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proyecto', null, [
                'label' => 'Seleccione el proyecto',
                'attr' => ['style' => 'width:97%;']
            ])
            ->add('tipoInmueble', 'choice', [
                'label' => 'Tipo de Inmueble',
                'choices' => [
                    0 => '',
                    1 => 'Casa',
                    2 => 'Apartamento'
                ]
            ])
            ->add('unidad', null, [
                'label' => 'Unidad'
            ])
            ->add('torreBloque', null, [
                'label' => 'Torre o bloque'
            ])
            ->add('apartamento', null, [
                'label' => 'Apartamento'
            ])
            ->add('fechaentrega',  null, [
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-MM-yyyy'
                ]
            ])
            ->add('tipodocumento','choice', [
                'choices' => [
                    0 => '',
                    1 => 'Cedula de Ciudadania',
                    2 => 'Cedula de Extranjeria',
                    3 => 'NIT'
                ]
            ])
            ->add('numerodocumento')
            ->add('nombrepropietario', null, [
                'attr' => ['style' => 'width:95%;']
            ])
            ->add('nombreapellidosol', null, [
                'attr' => ['style' => 'width:95%;']
            ])
            ->add('tipodocumentosol','choice', [
                'choices' => [
                    0 => '',
                    1 => 'Cedula de Ciudadania',
                    2 => 'Cedula de Extranjeria',
                    3 => 'NIT'
                ]
            ])
            ->add('numerodocumentosol')
            ->add('celular')
            ->add('fijo')
            ->add('email')
            ->add('tipocliente', 'choice', [
                'label' => 'Es usted:',
                'choices' => [
                    0 => '',
                    1 => 'Arrendatario',
                    2 => 'Propietario',
                    3 => 'Inmobiliaria',
                    4 => 'Apoderado'
                ]
            ])
            ->add('solicitudarreglo', null, [
                'attr' => ['style' => 'width:95%;height:150px;']
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Postventa'
        ));
    }
}
