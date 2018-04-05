<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 05/04/2018
 * Time: 10:34
 */

namespace AdminBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder->remove('plainPassword');
    }
    public function getParent()
    {
        return RegistrationFormType::class;
    }
}