<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 27/03/2018
 * Time: 17:49
 */

namespace AdminBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(
        array(
            'allow_extra_fields' => true
        )
    );
}
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('familyName');

    }


    public function getParent()
    {
        return BaseRegistrationFormType::class;

    }
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}