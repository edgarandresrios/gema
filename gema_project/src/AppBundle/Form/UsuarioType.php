<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;

class UsuarioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', HiddenType::class)
                ->add('nombre', FileType::class, array(
                    "label" => "Archivo txt:",
                    'data_class' => null,
                    'required' => false,
                    "attr" => array("class" => "form-control")
                ))
                ->add('save', SubmitType::class, array('label' => 'Guardar Informacion'));
    }

}
