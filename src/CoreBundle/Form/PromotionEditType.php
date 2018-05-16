<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 16/05/2018
 * Time: 11:50
 */

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PromotionEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function getParent()
    {
        return PromotionType::class;
    }

}