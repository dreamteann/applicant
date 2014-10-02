<?php

namespace Applicant\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder
            ->add('surname', null, array('label' => 'form.surname', 'translation_domain' => 'ApplicantUserBundle'))
            ->add('firstname',null, array('label'=>'form.firstname', 'translation_domain'=> 'ApplicantUserBundle'));
    }

    public function getName()
    {
        return 'applicant_user_registration';
    }
}