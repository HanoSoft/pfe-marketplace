<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 24/03/2018
 * Time: 12:39
 */
namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BrandEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('tag');
    }

    public function getParent()
    {
        return BrandType::class;
    }

}