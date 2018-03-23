<?php

namespace AdminBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productName')
            ->add('price',MoneyType::class,array('currency'=>''))
            ->add('quantity')
            ->add('productDetails',CKEditorType::class)
            ->add('color',EntityType::class, array(
                'class'        => 'CoreBundle:Color',
                'choice_label' => 'colorName',
                'multiple'     => false,
            ))
            ->add('category',EntityType::class, array(
                'class'        => 'CoreBundle:Category',
                'choice_label' => 'name',
                'multiple'     => false,
            ))
           ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_product';
    }


}
