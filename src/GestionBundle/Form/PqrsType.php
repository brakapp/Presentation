<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PqrsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'choice', array(
                    'choices' => array(
                            0 => 'Peticion',
                            1 => 'Queja',
                            2 => 'Reclamo',
                            3 => 'Sugerencia',
                            4 => 'Felicitacion',
                        )
                    )
                )
            ->add('nombres')
            ->add('apellidos')
            ->add('tdocumento', 'choice', [
                'label' => 'Tipo Documento',
                'choices' => [
                    0 => '',
                    1 => 'Cedula de Ciudadania',
                    2 => 'Cedula de Extranjeria',
                    3 => 'NIT'
                ]
            ])
            ->add('documento')
            ->add('celular')
            ->add('telefonof', null, array(
                'label' => 'Telefono Fijo'
            ))
            ->add('email')
            ->add('proyecto')
            ->add('texto', null, array(
                'label' => 'Cuentanos',
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
            'data_class' => 'GestionBundle\Entity\Pqrs'
        ));
    }
}
