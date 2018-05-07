<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 07/05/2018
 * Time: 15:09
 */

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class OrderEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

           $builder ->add('status')->add('status', ChoiceType::class, array(
                'choices'  => array(
                    'En cours' => 'En cours',
                    'En attente' => 'En attente',
                    'Livré'=>'Livré',
                )));

    }

    public function getParent()
    {
        return OrderType::class;
    }

}