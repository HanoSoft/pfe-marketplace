<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 12/05/2018
 * Time: 15:08
 */

namespace CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StockEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }
    public function getParent()
    {
        return StockType::class;
    }

}