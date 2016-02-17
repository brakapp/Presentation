<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
class CurriculumsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('cedula')
            ->add('email')
            ->add('urldocumento')
            ->add('cargo')
            ->add('departamento')
            ->add('ciudad', 'shtumi_dependent_filtered_entity', array(
                'entity_alias' => 'ciudad_by_dpto',
                'empty_value' => 'Select',
                'parent_field' => 'departamento',
                'required' => true,

            ))
            ->add('file','file', array(
                'required'=>'false',
                'label' => 'Hola de Vida'
            ))


        ;
    }

    public function getName()
    {
        return 'curriculum';
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Curriculums'
        ));
    }
}
